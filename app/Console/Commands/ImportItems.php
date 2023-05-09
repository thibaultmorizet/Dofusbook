<?php

namespace App\Console\Commands;

use App\Models\Conditions;
use App\Models\Effects;
use App\Models\Items;
use App\Models\Sets;
use App\Models\Types;
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

    public array $characteristicsImageTranslate = [
        "Vitalité" => "vitality",
        "(PV rendus)" => "vitality",
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
        "Neutre" => "neutral",
        "Force" => "strength",
        "Intelligence" => "intel",
        "Chance" => "luck",
        "Agilité" => "agility",
        "(vol Neutre)" => "neutral",
        "(vol Terre)" => "strength",
        "(vol Feu)" => "intel",
        "(vol Eau)" => "luck",
        "(vol Air)" => "agility",
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
        "Dommage Neutre" => "do_neutral",
        "Dommage Terre" => "do_earth",
        "Dommage Feu" => "do_fire",
        "Dommage Eau" => "do_water",
        "Dommage Air" => "do_air",
        "(dommages Neutre)" => "do_neutral",
        "(dommages Terre)" => "do_earth",
        "(dommages Feu)" => "do_fire",
        "(dommages Eau)" => "do_water",
        "(dommages Air)" => "do_air",
        "(dommage Neutre)" => "do_neutral",
        "(dommage Terre)" => "do_earth",
        "(dommage Feu)" => "do_fire",
        "(dommage Eau)" => "do_water",
        "(dommage Air)" => "do_air",
        "Dommages Critiques" => "do_critique",
        "Dommages Poussée" => "do_push",
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
        "Résistances Neutre JCJ" => "neutral_res",
        "Résistance Neutre JCJ" => "neutral_res",
        "Résistances Terre JCJ" => "earth_res",
        "Résistance Terre JCJ" => "earth_res",
        "Résistances Feu JCJ" => "fire_res",
        "Résistance Feu JCJ" => "fire_res",
        "Résistances Eau JCJ" => "water_res",
        "Résistance Eau JCJ" => "water_res",
        "Résistances Air JCJ" => "air_res",
        "Résistance Air JCJ" => "air_res",
        "% Résistances Neutre JCJ" => "neutral_res",
        "% Résistance Neutre JCJ" => "neutral_res",
        "% Résistances Terre JCJ" => "earth_res",
        "% Résistance Terre JCJ" => "earth_res",
        "% Résistances Feu JCJ" => "fire_res",
        "% Résistance Feu JCJ" => "fire_res",
        "% Résistances Eau JCJ" => "water_res",
        "% Résistance Eau JCJ" => "water_res",
        "% Résistances Air JCJ" => "air_res",
        "% Résistance Air JCJ" => "air_res",
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
        "Arme de chasse" => "title",
    ];
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
        "Neutre" => "neutral",
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
        "Dommage Neutre" => "do_neutral",
        "Dommage Terre" => "do_earth",
        "Dommage Feu" => "do_fire",
        "Dommage Eau" => "do_water",
        "Dommage Air" => "do_air",
        "Dommages Critiques" => "do_critique",
        "Dommages Poussée" => "do_push",
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
        "% Résistance Neutre" => "percent_neutral_res",
        "% Résistance Terre" => "percent_earth_res",
        "% Résistance Feu" => "percent_fire_res",
        "% Résistance Eau" => "percent_water_res",
        "% Résistance Air" => "percent_air_res",
        "Résistances Poussée" => "push_res",
        "Résistance Poussée" => "push_res",
        "% Résistances distance" => "distance_res",
        "% Résistance distance" => "distance_res",
    ];
    public array $characteristicsToIgnore = [
        "max.",
        "Ajouter un sort temporaire",
        "Échangeable :",
        "Utilisations restantes : /",
        "Nombre de victimes :",
        "Lié au personnage",
        "Craft coopératif impossible.",
        "Reçu le :",
        "Change l'apparence"
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
        $this->importItems();
        $this->importMounts();
    }

    private function importItems()
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

        foreach ($equipmentTypes as $anEquipmentType) {
            $type = Types::all()->where("name", "=", $anEquipmentType)->first();

            if (is_null($type)) {
                $type = new Types();
                $type->name = $anEquipmentType;
                $type->save();
            }

            $this->info('Start import of ' . $anEquipmentType . ' items');

            $equipmentRequest = "https://api.dofusdu.de/dofus2/fr/items/equipment?sort%5Blevel%5D=desc&filter%5Btype_name%5D=$anEquipmentType&filter%5Bmin_level%5D=0&filter%5Bmax_level%5D=200&page%5Bsize%5D=-1&fields%5Bitem%5D=recipe,description,conditions,effects,is_weapon,pods,parent_set,critical_hit_probability,critical_hit_bonus,is_two_handed,max_cast_per_turn,ap_cost,range";
            $equipmentList = Http::get($equipmentRequest);
            foreach ($equipmentList["items"] as $anEquipment) {
                $item = Items::query()->find($anEquipment["ankama_id"]);
                if (is_null($item)) {
                    $this->saveNewItem($anEquipment, $type);
                    continue;
                }
                if ($item->md5 !== md5(json_encode($anEquipment))) {
                    $this->updateExistingItem($item->id, $anEquipment, $type);
                }
            }
            $this->info('All items of ' . $anEquipmentType . ' type are imported');

            $itemsIds = $this->pluck($equipmentList["items"], "ankama_id");

            $itemsToDelete = Items::all()->where("type_id", "=", $type->type_id)->whereNotIn("id", $itemsIds);
            if (count($itemsToDelete) > 0) {
                foreach ($itemsToDelete as $item) {
                    $this->deleteItem($item->id);
                }
                $this->info('All items to deleted of ' . $anEquipmentType . ' type are deleted');
            }
        }
        $this->info('All items are imported');

    }

    private function importMounts()
    {
        $mountTypes = [
            "Dragodinde",
            "Muldo",
            "Volkorne"
        ];

        foreach ($mountTypes as $aMountType) {
            $type = Types::all()->where("name", "=", $aMountType)->first();

            if (is_null($type)) {
                $type = new Types();
                $type->name = $aMountType;
                $type->save();
            }
            $this->info('Start import of ' . $aMountType . ' mounts');

            $mountRequest = "https://api.dofusdu.de/dofus2/fr/mounts?filter%5Bfamily_name%5D=$aMountType&page%5Bsize%5D=-1&fields%5Bmount%5D=effects";
            $mountList = Http::get($mountRequest);
            foreach ($mountList["mounts"] as $anEquipment) {
                $mount = Items::query()->find($anEquipment["ankama_id"]);
                $anEquipment["level"] = 60;
                $anEquipment["is_weapon"] = false;
                if (is_null($mount)) {
                    $this->saveNewItem($anEquipment, $type);
                    continue;
                }
                if ($mount->md5 !== md5(json_encode($anEquipment))) {
                    $this->updateExistingItem($mount->id, $anEquipment, $type);
                }
            }
            $this->info('All mounts of ' . $aMountType . ' type are imported');

            $mountsIds = $this->pluck($mountList["mounts"], "ankama_id");

            $mountsToDelete = Items::all()->where("type_id", "=", $type->type_id)->whereNotIn("id", $mountsIds);
            if (count($mountsToDelete) > 0) {
                foreach ($mountsToDelete as $mount) {
                    $this->deleteItem($mount->id);
                }
                $this->info('All mounts to deleted of ' . $aMountType . ' type are deleted');
            }
        }
        $this->info('All mounts are imported');

    }

    private function saveNewItem($item, Types $type)
    {
        $newItem = new Items();
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
            $parentSet = Sets::query()->find($parentSetId);
            if (is_null($parentSet)) {
                $this->createSet($parentSetId);
            }
            $newItem->set_id = $parentSetId;
        }

        if ($newItem->save()) {
            $effects = Arr::get($item, "effects");
            if (is_null($effects) === false) {
                $this->saveItemEffects($newItem->id, $effects);
            }
            $conditions = Arr::get($item, "conditions");
            if (is_null($conditions) === false) {
                $this->saveItemConditions($newItem->id, $conditions);
            }
        }
    }

    private function updateExistingItem(int $itemId, array $item, Types $type)
    {
        $this->deleteItem($itemId);
        $this->saveNewItem($item, $type);
    }

    private function saveItemEffects(int $itemId, array $effects): void
    {
        foreach ($effects as $effect) {
            $this->saveEffect($effect, itemId: $itemId);
        }
    }

    private function saveSetEffects(int $setId, array $effectsGroups): void
    {
        foreach ($effectsGroups as $index => $effectsGroup) {
            $itemsNumber = $index + 2;
            foreach ($effectsGroup as $effect) {
                $this->saveEffect($effect, itemsNumber: $itemsNumber, setId: $setId);
            }
        }
    }

    private function createSet(int $parentSetId)
    {
        $setRequest = "https://api.dofusdu.de/dofus2/fr/sets/$parentSetId";
        $setResult = Http::get($setRequest);
        $set = new Sets();
        $set->id = Arr::get($setResult, "ankama_id");
        $set->name = Arr::get($setResult, "name");
        $set->number_of_items = count(Arr::get($setResult, "equipment_ids"));
        $set->level = Arr::get($setResult, "highest_equipment_level");

        if ($set->save()) {
            $this->saveSetEffects($set->id, Arr::get($setResult, "effects"));
        }

    }

    private function saveEffect(array $effectDatas, int $itemsNumber = null, int $itemId = null, int $setId = null): void
    {
        $name = Arr::get(Arr::get($effectDatas, "type"), "name");

        if (array_search($name, $this->characteristicsToIgnore) !== false) {
            return;
        }

        $image_name = Arr::get($this->characteristicsImageTranslate, $name);
        $translate_name = Arr::get($this->characteristicsTranslate, $name);

        $effect = new Effects();
        $effect->name = $name;
        $effect->image = ('/img/icons/' . $image_name . '.png');
        $effect->translated_name = $translate_name;
        $effect->int_minimum = Arr::get($effectDatas, "int_minimum");
        $effect->int_maximum = Arr::get($effectDatas, "int_maximum");
        $effect->ignore_int_min = Arr::get($effectDatas, "ignore_int_min");
        $effect->ignore_int_max = Arr::get($effectDatas, "ignore_int_max");
        $effect->formatted_name = Arr::get($effectDatas, "formatted");
        $effect->item_id = $itemId;
        $effect->set_id = $setId;
        $effect->set_number_items = $itemsNumber;
        if ($effect->save() === false) {
            return;
        }
        $effect->id;
    }

    private function saveItemConditions(int $itemId, array $conditions): void
    {
        foreach ($conditions as $condition) {
            $this->saveCondition($condition, $itemId);
        }
    }

    private function saveCondition(array $conditionDatas, int $itemId): void
    {
        $name = Arr::get(Arr::get($conditionDatas, "element"), "name");
        if ($name === "") {
            return;
        }
        $condition = new Conditions();
        $condition->name = $name;
        $condition->operator = Arr::get($conditionDatas, "operator");
        $condition->int_value = Arr::get($conditionDatas, "int_value");
        $condition->item_id = $itemId;
        if ($condition->save() === false) {
            return;
        }
        $condition->id;
    }

    private function deleteItem(int $itemId)
    {
        $itemToDelete = Items::query()->find($itemId);
        $itemToDelete->delete();
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
