<?php

namespace App\Console\Commands;

use App\Models\Conditions;
use App\Models\DommageGroups;
use App\Models\Effects;
use App\Models\Ressources;
use App\Models\RessourceTypes;
use App\Models\Sets;
use App\Models\SpellCharacteristics;
use App\Models\SpellEffects;
use App\Models\Spells;
use App\Models\Types;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ImportRessources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:import-ressources';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all ressources via api';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $consumableTypeList = $this->getAllConsumableTypes();
        $this->importConsumables($consumableTypeList);
        $ressourceTypeList = $this->getAllRessourceTypes();
        $this->importRessources($ressourceTypeList);

    }

    private function getAllRessourceTypes(): array
    {
        $ressourceRequest = "https://api.dofusdu.de/dofus2/fr/items/resources/all?sort%5Blevel%5D=desc&filter%5Bmin_level%5D=1&filter%5Bmax_level%5D=200";
        $ressourceList = Http::get($ressourceRequest);
        $ressourceTypeList = [];
        foreach ($ressourceList["items"] as $aRessource) {
            $ressourceTypeName = Arr::get($aRessource, "type.name");
            if (!in_array($ressourceTypeName, $ressourceTypeList)) {
                $ressourceTypeList[] = $ressourceTypeName;
            }
        }
        return $ressourceTypeList;
    }

    private function getAllConsumableTypes(): array
    {
        $consumablesRequest = "https://api.dofusdu.de/dofus2/fr/items/consumables/all?sort%5Blevel%5D=desc&filter%5Bmin_level%5D=1&filter%5Bmax_level%5D=200";
        $consumablesList = Http::get($consumablesRequest);
        $consumablesTypeList = [];
        foreach ($consumablesList["items"] as $aConsumables) {
            $consumablesTypeName = Arr::get($aConsumables, "type.name");
            if (!in_array($consumablesTypeName, $consumablesTypeList)) {
                $consumablesTypeList[] = $consumablesTypeName;
            }
        }
        return $consumablesTypeList;
    }

    private function importRessources(array $ressourceTypeList)
    {
        foreach ($ressourceTypeList as $aRessourceType) {
            $ressourceType = RessourceTypes::all()->where("name", "=", $aRessourceType)->first();
            if (is_null($ressourceType)) {
                $ressourceType = new RessourceTypes();
                $ressourceType->name = $aRessourceType;
                $ressourceType->save();
            }
            $this->info('Start import of ' . $aRessourceType . ' ressources');

            $ressourceRequest = "https://api.dofusdu.de/dofus2/fr/items/resources?sort%5Blevel%5D=desc&filter%5Btype_name%5D=" . $aRessourceType . "&filter%5Bmin_level%5D=1&filter%5Bmax_level%5D=200&page%5Bsize%5D=-1&fields%5Bitem%5D=recipe,description,conditions,effects";
            $ressourceList = Http::get($ressourceRequest);
            foreach ($ressourceList["items"] as $aRessource) {
                $ressource = Ressources::query()->find($aRessource["ankama_id"]);
                if (is_null($ressource)) {
                    $this->saveNewRessource($aRessource, $ressourceType);
                    continue;
                }
                if ($ressource->md5 !== md5(json_encode($aRessource))) {
                    $this->updateExistingRessource($ressource->id, $aRessource, $ressourceType);
                }
            }
            $this->info('All ressources of ' . $aRessourceType . ' type are imported');

            $ressourcesIds = $this->pluck($ressourceList["items"], "ankama_id");
            $ressourcesToDelete = Ressources::all()->where("ressource_type_id", "=", $ressourceType->id)->whereNotIn("id", $ressourcesIds);
            if (count($ressourcesToDelete) > 0) {
                foreach ($ressourcesToDelete as $ressource) {
                    $this->deleteRessource($ressource->id);
                }
                $this->info('All ressources to delete of ' . $aRessourceType . ' type are deleted');
            }
        }
        $this->info('All ressources are imported');

    }

    private function importConsumables(array $consumableTypeList)
    {
        foreach ($consumableTypeList as $aConsumableType) {
            $consumableType = RessourceTypes::all()->where("name", "=", $aConsumableType)->first();
            if (is_null($consumableType)) {
                $consumableType = new RessourceTypes();
                $consumableType->name = $aConsumableType;
                $consumableType->save();
            }
            $this->info('Start import of ' . $aConsumableType . ' consumables');

            $consumableRequest = "https://api.dofusdu.de/dofus2/fr/items/consumables?sort%5Blevel%5D=desc&filter%5Btype_name%5D=" . $aConsumableType . "&filter%5Bmin_level%5D=1&filter%5Bmax_level%5D=200&page%5Bsize%5D=-1&fields%5Bitem%5D=recipe,description,conditions,effects";
            $consumableList = Http::get($consumableRequest);
            foreach ($consumableList["items"] as $aConsumable) {
                $consumable = Ressources::query()->find($aConsumable["ankama_id"]);
                if (is_null($consumable)) {
                    $this->saveNewRessource($aConsumable, $consumableType);
                    continue;
                }
                if ($consumable->md5 !== md5(json_encode($aConsumable))) {
                    $this->updateExistingRessource($consumable->id, $aConsumable, $consumableType);
                }
            }
            $this->info('All consumables of ' . $aConsumableType . ' type are imported');

            $consumablesIds = $this->pluck($consumableList["items"], "ankama_id");
            $consumablesToDelete = Ressources::all()->where("ressource_type_id", "=", $consumableType->id)->whereNotIn("id", $consumablesIds);
            if (count($consumablesToDelete) > 0) {
                foreach ($consumablesToDelete as $consumable) {
                    $this->deleteRessource($consumable->id);
                }
                $this->info('All consumables to delete of ' . $aConsumableType . ' type are deleted');
            }
        }
        $this->info('All consumables are imported');

    }

    private function updateExistingRessource(int $ressourceId, array $ressource, RessourceTypes $ressourceType)
    {
        $this->deleteRessource($ressourceId);
        $this->saveNewRessource($ressource, $ressourceType);
    }

    private function deleteRessource(int $ressourceId)
    {
        $ressourceToDelete = Ressources::query()->find($ressourceId);
        $ressourceToDelete->delete();
    }

    private function saveNewRessource($ressource, RessourceTypes $ressourceType)
    {
        $newRessource = new Ressources();
        $newRessource->id = Arr::get($ressource, "ankama_id");
        $newRessource->name = Arr::get($ressource, "name");
        $newRessource->ressource_type_id = $ressourceType->id;
        $newRessource->level = Arr::get($ressource, "level");
        $newRessource->image = Arr::get($ressource, "image_urls.hd") ?? Arr::get($ressource, "image_urls.icon");
        $newRessource->summary = Arr::get($ressource, "description");
        $newRessource->md5 = md5(json_encode($ressource));
        $newRessource->save();
    }

    function pluck($array, $field): array
    {
        $ids = [];

        foreach ($array as $item) {
            $tmpField = $field;
            if (is_array($tmpField)) {

                $tmpItem = $item[$tmpField[0]];

                array_splice($tmpField, 0, 1);

                foreach ($tmpField as $subfield) {
                    $tmpItem = $tmpItem[$subfield];
                }

                $ids[] = $tmpItem;
                continue;

            }

            $ids[] = $item[$field];

        }
        return $ids;
    }


}
