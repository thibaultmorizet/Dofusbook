<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Models\Type;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ImportItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:import-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import of all items via api';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $equipmentTypes = [
            "Amulette",
            "Bouclier",
            "Anneau",
            "Ceinture",
            "Bottes",
            "Chapeau",
            "Cape",
            "Dofus",
            "Familier",
            "Montilier",
            "Arc",
            "Baguette",
            "Bâton",
            "Épée",
            "Faux",
            "Hache",
            "Lance",
            "Marteau",
            "Pelle",
            "Pioche",
            "Trophée",
            "Prysmaradite"
        ];
        $mountTypes = [
            "Dragodinde",
            "Muldo",
            "Volkorne"
        ];
        foreach ($equipmentTypes as $anEquipmentType) {
            $type = Type::all()->where("name", "=", $anEquipmentType)->first();

            if (is_null($type)) {
                $type = new Type();
                $type->name = $anEquipmentType;
                $type->save();
            }

            $equipmentRequest = "https://api.dofusdu.de/dofus2/fr/items/equipment?sort%5Blevel%5D=desc&filter%5Btype_name%5D={$anEquipmentType}&filter%5Bmin_level%5D=0&filter%5Bmax_level%5D=200&page%5Bsize%5D=-1&fields%5Bitem%5D=recipe,description,conditions,effects,is_weapon,pods,parent_set,critical_hit_probability,critical_hit_bonus,is_two_handed,max_cast_per_turn,ap_cost,range";
            $equipmentList = Http::get($equipmentRequest);
            foreach ($equipmentList["items"] as $anEquipment) {
                $item = Item::query()->find($anEquipment["ankama_id"]);
                if (is_null($item)) {
                    $this->saveNewItem($anEquipment, $type);
                    continue;
                }
                if ($item->md5 !== md5(json_encode($anEquipment))) {
                    $this->updateExistingItem($item->id, $anEquipment);
                }
            }
        }
        $this->info('Daily report has been sent successfully!');

    }

    private function saveNewItem($item, Type $type)
    {
        $newItem = new Item();
        $newItem->id = Arr::get($item, "ankama_id");
        $newItem->name = Arr::get($item, "name");
        $newItem->summary = Arr::get($item, "description");
        $newItem->type_id = $type->id;
        $newItem->level = Arr::get($item, "level");
        $newItem->pods = Arr::get($item, "pods");
        $newItem->is_weapon = Arr::get($item, "is_weapon");
        $newItem->image = Arr::get(Arr::get($item, "image_urls"), "hd");
        $newItem->critical_hit_probability = Arr::get($item, "critical_hit_probability");
        $newItem->critical_hit_bonus = Arr::get($item, "critical_hit_bonus");
        $newItem->is_two_handed = Arr::get($item, "is_two_handed");
        $newItem->max_cast_per_turn = Arr::get($item, "max_cast_per_turn");
        $newItem->ap_cost = Arr::get($item, "ap_cost");
        $newItem->range_min = Arr::get(Arr::get($item, "range"), "min");
        $newItem->range_max = Arr::get(Arr::get($item, "range"), "max");
        $newItem->md5 = md5(json_encode($item));
        $parentSetId = Arr::get(Arr::get($item, "parent_set"), "id");
        if ($parentSetId) {
            //        TODO Ajout parent_set

            var_dump($parentSetId);
            die();
        }
//        TODO Ajout conditions
        if ($newItem->save()) {
            $this->saveEffects($newItem->id, Arr::get($item, "effects"));
        };

    }

    private function updateExistingItem(int $id, mixed $item)
    {
        var_dump($id, $item);
        die();

    }

    private function saveEffects(int $id, mixed $effects)
    {
    }
}
