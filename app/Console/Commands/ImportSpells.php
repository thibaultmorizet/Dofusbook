<?php

namespace App\Console\Commands;

use App\Models\Conditions;
use App\Models\DommageGroups;
use App\Models\Effects;
use App\Models\Items;
use App\Models\Sets;
use App\Models\SpellCharacteristics;
use App\Models\SpellEffects;
use App\Models\Spells;
use App\Models\Types;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ImportSpells extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:import-spells';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all spells via api';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->importSpells();
    }

    private function importSpells()
    {
        $spells = json_decode(file_get_contents('C:\laragon\www\Dofusbook\storage\app\spells\spells.json'), true);
        foreach ($spells as $spell) {


            $dbSpell = Spells::query()->find(Arr::get($spell, 'official'));
            if (is_null($dbSpell)) {
                $this->saveNewSpell($spell);
                continue;
            }
            if ($dbSpell->md5 !== md5(json_encode($spell))) {
                $this->updateExistingSpell($dbSpell->id, $spell);
            }
        }

        $spellsIds = $this->pluck($spells, "official");

        $spellsToDelete = Spells::all()->whereNotIn("id", $spellsIds);
        if (count($spellsToDelete) > 0) {
            foreach ($spellsToDelete as $spell) {
                $this->deleteSpell($spell->id);
            }
            $this->info('All spells to delete are deleted');
        }

        $this->info('All spells are imported');

    }

    private function saveNewSpell(array $spell)
    {
        $imageToDownload = "https://www.dofusbook.net/static/spells/" . Arr::get($spell, 'icon') . ".png";
        $image = "/img/spells/" . Arr::get($spell, 'icon') . ".png";
        $imagePath = "C:\laragon\www\Dofusbook\public\img\spells/" . Arr::get($spell, 'icon') . ".png";
        if (!file_exists($imagePath)) {
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $imageToDownload);
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Dofusbook');
            curl_exec($curl_handle);
            $httpCode = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
            curl_close($curl_handle);

            if ($httpCode !== 404)
                file_put_contents($imagePath, file_get_contents($imageToDownload));
        }

        $newSpell = new Spells();
        $newSpell->id = Arr::get($spell, "official");
        $newSpell->class_id = Arr::get($spell, "class_id");
        $newSpell->name = Arr::get($spell, "name");
        $newSpell->summary = Arr::get($spell, "description");
        $newSpell->image = $image;
        $newSpell->spell_group = Arr::get($spell, "id");
        $newSpell->level1 = Arr::get($spell, "level1");
        $newSpell->level2 = Arr::get($spell, "level2");
        $newSpell->level3 = Arr::get($spell, "level3");
        $newSpell->is_invoc = Arr::get($spell, "is_invoc");
        $newSpell->is_variante = Arr::get($spell, "is_variante");
        $newSpell->sum_damages = Arr::get($spell, "sum_damages");
        $newSpell->md5 = md5(json_encode($spell));
        if ($newSpell->save()) {
            $spellCharacteristics = Arr::get($spell, "caracs");
            if (is_null($spellCharacteristics) === false) {
                $this->saveSpellCharacteristics($newSpell->id, $spellCharacteristics);
            }
            $dommageGroups = Arr::get($spell, "groups");
            if (is_null($dommageGroups) === false) {
                $this->saveDommageGroups($newSpell->id, $dommageGroups);
            }
        }
    }

    private function saveSpellCharacteristics(int $spellId, array $spellCharacteristics)
    {
        foreach ($spellCharacteristics as $index => $spellCharacteristic) {
            $level = $index + 1;
            $this->saveSpellCharacteristic($spellCharacteristic, $spellId, $level);
        }
    }

    private function saveSpellCharacteristic(array $spellCharacteristics, int $spellId, int $level)
    {
        $newSpellCharacteristic = new SpellCharacteristics();
        $newSpellCharacteristic->spell_id = $spellId;
        $newSpellCharacteristic->{"is_level$level"} = true;

        foreach ($spellCharacteristics as $spellCharacteristicName => $spellCharacteristicValue) {
            if ($spellCharacteristicName === "zo") {
                $newSpellCharacteristic->zo = true;
                $newSpellCharacteristic->zo_zo = Arr::get($spellCharacteristicValue, "zo");
                $newSpellCharacteristic->zo_po = Arr::get($spellCharacteristicValue, "po");
            } else {
                $newSpellCharacteristic->{$spellCharacteristicName} = $spellCharacteristicValue;
            }
        }
        $newSpellCharacteristic->save();
    }

    private function saveDommageGroups(int $spellId, array $dommageGroups)
    {
        foreach ($dommageGroups as $index => $dommageGroup) {
            $level = $index + 1;
            $this->saveDommageGroup($dommageGroup, $spellId, $level);
        }
    }

    private function saveDommageGroup(array $dommageGroup, int $spellId, int $level)
    {
        $newDommageGroup = new DommageGroups();
        $newDommageGroup->spell_id = $spellId;
        $newDommageGroup->order = $level;
        $newDommageGroup->title = Arr::get($dommageGroup, "title");
        if ($newDommageGroup->save()) {
            $this->saveSpellEffects($newDommageGroup->id, Arr::get($dommageGroup, "effects"));
        }
    }

    private function saveSpellEffects(int $dommagegroupId, array $effects)
    {
        foreach ($effects as $effect) {
            $this->saveSpellEffect($effect, $dommagegroupId);
        }
    }

    private function saveSpellEffect(array $effect, int $dommagegroupId)
    {
        $newSpellEffect = new SpellEffects();
        $newSpellEffect->level = Arr::get($effect, "level");
        $newSpellEffect->effect = Arr::get($effect, "effect");
        $newSpellEffect->cc = Arr::get($effect, "cc");
        $newSpellEffect->min = Arr::get($effect, "min");
        $newSpellEffect->max = Arr::get($effect, "max");
        $newSpellEffect->duration = Arr::get($effect, "duration");
        $newSpellEffect->dommage_group_id = $dommagegroupId;
        $newSpellEffect->save();
    }

    private function updateExistingSpell(int $spellId, array $spell)
    {
        $this->deleteSpell($spellId);
        $this->saveNewSpell($spell);
    }

    private function deleteSpell(int $spellId)
    {
        $spellToDelete = Spells::query()->find($spellId);
        $spellToDelete->delete();
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
