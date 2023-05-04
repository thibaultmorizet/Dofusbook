<?php

namespace App\Console\Commands;

use App\Models\Effect;
use App\Models\Item;
use App\Models\ItemEffect;
use App\Models\Set;
use App\Models\SetEffect;
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

    public array $characteristicsTranslate = [
        "Vitalité" => "vitality",
        "Prospection" => "prospection",
        "PA" => "pa",
        "PM" => "pm",
        "Portée" => "po",
        "Initiative" => "initiative",
        "% Critique" => "critic",
        "Invocation" => "invocation",
        "Invocations" => "invocation",
        "Soins" => "health",
        "Soin" => "health",
        "Sagesse" => "wisdom",
        "Force" => "strength",
        "Intelligence" => "intel",
        "Chance" => "luck",
        "Agilité" => "agility",
        "Puissance" => "power",
        "Fuite" => "leak",
        "Tacle" => "tackle",
        "Esquive PA" => "avoid_pa",
        "Esquive PM" => "avoid_pm",
        "Retrait PA" => "pa_recession",
        "Retrait PM" => "pm_recession",
        "Pods" => "pods",
        "Dommage" => "do",
        "Dommages" => "do",
        "Dommages Neutre" => "do_neutral",
        "Dommages Terre" => "do_earth",
        "Dommages Feu" => "do_fire",
        "Dommages Eau" => "do_water",
        "Dommages Air" => "do_air",
        "Dommages Critiques" => "do_critique",
        "Dommages Poussée" => "do_push",
        "Dommage Neutre" => "do_neutral",
        "Dommage Terre" => "do_earth",
        "Dommage Feu" => "do_fire",
        "Dommage Eau" => "do_water",
        "Dommage Air" => "do_air",
        "Dommage Critiques" => "do_critique",
        "Dommage Poussée" => "do_push",
        "Dommage Pièges" => "do_tricks",
        "Dommages Pièges" => "do_tricks",
        "% Dommages d'armes" => "do_weapon",
        "% Dommages aux sorts" => "do_spell",
        "% Dommages mêlée" => "do_melee",
        "% Dommages distance" => "do_distance",
        "Résistances Neutre" => "neutral_res",
        "Résistance Neutre" => "neutral_res",
        "Résistances Terre" => "earth_res",
        "Résistance Terre" => "earth_res",
        "Résistances Feu" => "fire_res",
        "Résistance Feu" => "fire_res",
        "Résistances Eau" => "water_res",
        "Résistance Eau" => "water_res",
        "Résistances Air" => "air_res",
        "Résistance Air" => "air_res",
        "Résistances Critiques" => "critique_res",
        "Résistance Critiques" => "critique_res",
        "% Résistance mêlée" => "melee_res",
        "% Résistance aux armes" => "weapon_res",
        "% Résistance Neutre" => "neutral_res",
        "% Résistance Terre" => "earth_res",
        "% Résistance Feu" => "fire_res",
        "% Résistance Eau" => "water_res",
        "% Résistance Air" => "air_res",
        "Résistances Poussée" => "push_res",
        "Résistance Poussée" => "push_res",
        "% Résistances distance" => "distance_res",
        "% Résistance distance" => "distance_res",
        "Puissance (pièges)" => "trick_power",
        "-special spell-" => "special_spell",
        "Désactive la ligne de vue du sort" => "no_ldv",
        "Augmente de% les Critiques du sort" => "critic",
        "Réduit de le coût en PA du sort" => "pa",
        "Augmente la portée maximale du sort de" => "po",
        "Désactive le lancer en ligne du sort" => "no_line",
        "Rend la portée du sort modifiable" => "po",
        "Réduit de le délai de relance du sort" => "lunch_delay",
        "Augmente de les Dommages du sort" => "do",
        "Le sort peut être lancé sur une case libre" => "no_line",
        "Augmente de le nombre de lancer maximal par tour du sort" => "lunch_per_tour",
        "Augmente de le nombre de lancer maximal par cible du sort" => "lunch_per_cible",
        "Augmente les dégâts de base du sort de" => "do",
        "Quelqu'un vous suit !" => "title",
        "Renvoie dommages" => "return_attack",
        "Renvoie dommage" => "return_attack",
        "Change les paroles" => "title",
        "Attitude" => "attitude",
        "Titre :" => "title",
    ];

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
                die();
            }
            $this->info('All items of ' . $anEquipmentType . ' type are imported');
            die();
        }
        $this->info('All items are imported');
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
            $parentSet = Set::query()->find($parentSetId);
            if (is_null($parentSet)) {
                $this->createSet($parentSetId);
            }
            $newItem->set_id = $parentSetId;
        }
//        TODO Ajout conditions
        if ($newItem->save()) {
            $this->saveItemEffects($newItem->id, Arr::get($item, "effects"));
        };

    }

    private function updateExistingItem(int $id, array $item)
    {
        var_dump($id, $item);
        die();

    }

    private function saveItemEffects(int $id, array $effects)
    {
    }

    private function saveSetEffects(int $id, array $effectsGroups)
    {
        foreach ($effectsGroups as $index => $effectsGroup) {
            $itemsNumber = $index + 2;
            foreach ($effectsGroup as $effect) {
                $effectId = $this->saveEffect($effect);
                if ($effectId === false) {
                    return false;
                }
                $this->linkEffectToSet($effectId, $id, $itemsNumber);

            }
        }
    }

    private function createSet(mixed $parentSetId)
    {
        $setRequest = "https://api.dofusdu.de/dofus2/fr/sets/{$parentSetId}";
        $setResult = Http::get($setRequest);
        $set = new Set();
        $set->id = Arr::get($setResult, "ankama_id");
        $set->name = Arr::get($setResult, "name");
        $set->items = count(Arr::get($setResult, "equipment_ids"));
        $set->level = Arr::get($setResult, "highest_equipment_level");

        if ($set->save()) {
            $this->saveSetEffects($set->id, Arr::get($setResult, "effects"));
        };

    }

    private function linkEffectToSet(int $effectId, int $setId, int $itemsNumber)
    {
        $setEffect = new SetEffect();
        $setEffect->set_id = $setId;
        $setEffect->effect_id = $effectId;
        $setEffect->items_number = $itemsNumber;
        $setEffect->save();
    }

    private function linkEffectToItem(int $effectId, int $itemId)
    {
        $itemEffect = new ItemEffect();
        $itemEffect->item_id = $itemId;
        $itemEffect->effect_id = $effectId;
        $itemEffect->save();
    }

    private function saveEffect(array $effectDatas)
    {
        $translate_name = Arr::get($this->characteristicsTranslate, Arr::get(Arr::get($effectDatas, "type"), "name"));;
        $effect = new Effect();
        $effect->name = Arr::get(Arr::get($effectDatas, "type"), "name");
        $effect->image = ('/img/icons/' . $translate_name . '.png');
        $effect->translate_name = $translate_name;
        $effect->int_minimum = Arr::get($effectDatas, "int_minimum");
        $effect->int_maximum = Arr::get($effectDatas, "int_maximum");
        $effect->ignore_int_min = Arr::get($effectDatas, "ignore_int_min");
        $effect->ignore_int_max = Arr::get($effectDatas, "ignore_int_max");
        $effect->formatted_name = Arr::get($effectDatas, "formatted");
        if ($effect->save() === false) {
            return false;
        }
        return $effect->id;
    }

}
