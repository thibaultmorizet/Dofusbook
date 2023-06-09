<?php

namespace App\Console\Commands;

use App\Models\Conditions;
use App\Models\Effects;
use App\Models\ItemRessources;
use App\Models\Items;
use App\Models\Ressources;
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
        "Dommages Terre" => "do_strength",
        "Dommages Feu" => "do_intel",
        "Dommages Eau" => "do_luck",
        "Dommages Air" => "do_agility",
        "Dommage Neutre" => "do_neutral",
        "Dommage Terre" => "do_strength",
        "Dommage Feu" => "do_intel",
        "Dommage Eau" => "do_luck",
        "Dommage Air" => "do_agility",
        "(dommages Neutre)" => "do_neutral",
        "(dommages Terre)" => "do_strength",
        "(dommages Feu)" => "do_intel",
        "(dommages Eau)" => "do_luck",
        "(dommages Air)" => "do_agility",
        "(dommage Neutre)" => "do_neutral",
        "(dommage Terre)" => "do_strength",
        "(dommage Feu)" => "do_intel",
        "(dommage Eau)" => "do_luck",
        "(dommage Air)" => "do_agility",
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
        "Résistances Terre" => "strength_res",
        "Résistance Terre" => "strength_res",
        "Résistances Feu" => "intel_res",
        "Résistance Feu" => "intel_res",
        "Résistances Eau" => "luck_res",
        "Résistance Eau" => "luck_res",
        "Résistances Air" => "agility_res",
        "Résistance Air" => "agility_res",
        "Résistances Neutre JCJ" => "neutral_res",
        "Résistance Neutre JCJ" => "neutral_res",
        "Résistances Terre JCJ" => "strength_res",
        "Résistance Terre JCJ" => "strength_res",
        "Résistances Feu JCJ" => "intel_res",
        "Résistance Feu JCJ" => "intel_res",
        "Résistances Eau JCJ" => "luck_res",
        "Résistance Eau JCJ" => "luck_res",
        "Résistances Air JCJ" => "agility_res",
        "Résistance Air JCJ" => "agility_res",
        "% Résistances Neutre JCJ" => "neutral_res",
        "% Résistance Neutre JCJ" => "neutral_res",
        "% Résistances Terre JCJ" => "strength_res",
        "% Résistance Terre JCJ" => "strength_res",
        "% Résistances Feu JCJ" => "intel_res",
        "% Résistance Feu JCJ" => "intel_res",
        "% Résistances Eau JCJ" => "luck_res",
        "% Résistance Eau JCJ" => "luck_res",
        "% Résistances Air JCJ" => "agility_res",
        "% Résistance Air JCJ" => "agility_res",
        "Résistances Critiques" => "critique_res",
        "Résistance Critiques" => "critique_res",
        "% Résistance mêlée" => "melee_res",
        "% Résistance aux armes" => "weapon_res",
        "% Résistance Neutre" => "neutral_res",
        "% Résistance Terre" => "strength_res",
        "% Résistance Feu" => "intel_res",
        "% Résistance Eau" => "luck_res",
        "% Résistance Air" => "agility_res",
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
        "Dommages Terre" => "do_strength",
        "Dommages Feu" => "do_intel",
        "Dommages Eau" => "do_luck",
        "Dommages Air" => "do_agility",
        "Dommage Neutre" => "do_neutral",
        "Dommage Terre" => "do_strength",
        "Dommage Feu" => "do_intel",
        "Dommage Eau" => "do_luck",
        "Dommage Air" => "do_agility",
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
        "Résistances Terre" => "strength_res",
        "Résistance Terre" => "strength_res",
        "Résistances Feu" => "intel_res",
        "Résistance Feu" => "intel_res",
        "Résistances Eau" => "luck_res",
        "Résistance Eau" => "luck_res",
        "Résistances Air" => "agility_res",
        "Résistance Air" => "agility_res",
        "Résistances Critiques" => "critique_res",
        "Résistance Critiques" => "critique_res",
        "% Résistance mêlée" => "melee_res",
        "% Résistance aux armes" => "weapon_res",
        "% Résistance Neutre" => "percent_neutral_res",
        "% Résistance Terre" => "percent_strength_res",
        "% Résistance Feu" => "percent_intel_res",
        "% Résistance Eau" => "percent_luck_res",
        "% Résistance Air" => "percent_agility_res",
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
        "Attitude",
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

            $equipmentRequest = "https://api.dofusdu.de/dofus2/fr/items/equipment?sort%5Blevel%5D=asc&filter%5Btype_name%5D=$anEquipmentType&filter%5Bmin_level%5D=0&filter%5Bmax_level%5D=200&page%5Bsize%5D=-1&fields%5Bitem%5D=recipe,description,conditions,effects,is_weapon,pods,parent_set,critical_hit_probability,critical_hit_bonus,is_two_handed,max_cast_per_turn,ap_cost,range";
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
                $this->info('All items to delete of ' . $anEquipmentType . ' type are deleted');
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
            $ressources = Arr::get($item, "recipe");
            if (is_null($ressources) === false) {
                $this->saveItemRecipeRessources($newItem->id, $ressources);
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

    private function saveEffect(array $effectData, int $itemsNumber = null, int $itemId = null, int $setId = null): void
    {
        $name = Arr::get(Arr::get($effectData, "type"), "name");

        if (array_search($name, $this->characteristicsToIgnore) !== false) {
            return;
        }

        $image_name = Arr::get($this->characteristicsImageTranslate, $name);
        $translate_name = Arr::get($this->characteristicsTranslate, $name);
        if ($name == "Soin") {
            $name = "Soins";
        }
        if (str_contains($name, "ommage")) {
            $name = str_replace(
                "ommage",
                "ommages",
                str_replace(
                    "ommages",
                    "ommage",
                    $name)
            );
        }
        if (str_contains($name, "ésistance")) {
            $name = str_replace(
                "ésistance",
                "ésistances",
                str_replace(
                    "ésistances",
                    "ésistance",
                    $name)
            );
        }
        $effect = new Effects();
        $effect->name = $name;
        $effect->image = ('/img/icons/' . $image_name . '.png');
        $effect->translated_name = $translate_name;
        $effect->int_minimum = Arr::get($effectData, "int_minimum");
        $effect->int_maximum = Arr::get($effectData, "int_maximum");
        $effect->ignore_int_min = Arr::get($effectData, "ignore_int_min");
        $effect->ignore_int_max = Arr::get($effectData, "ignore_int_max");
        $effect->formatted_name = Arr::get($effectData, "formatted");
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

    private function saveItemRecipeRessources(int $itemId, array $ressources)
    {
        foreach ($ressources as $ressource) {
            $this->saveStuffRessource($itemId, $ressource);
        }
    }

    private function saveStuffRessource(int $itemId, array $ressourceData): void
    {
if ($itemId===13827){
    dump($itemId);
    dump($ressourceData);
    dump(Items::query()->where("id", "=", Arr::get($ressourceData, "item_ankama_id"))->first());
}
        $ressource = Ressources::query()->where("id", "=", Arr::get($ressourceData, "item_ankama_id"))->first();
        $item = Items::query()->where("id", "=", Arr::get($ressourceData, "item_ankama_id"))->first();

        $itemRessource = new ItemRessources();
        $itemRessource->item_id = $itemId;
        $itemRessource->ressource_id = $ressource->id ?? null;
        $itemRessource->item_ressource_id = $item->id ?? null;
        $itemRessource->quantity = Arr::get($ressourceData, "quantity");
        if ($itemRessource->save() === false) {
            return;
        }
        $itemRessource->id;
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
