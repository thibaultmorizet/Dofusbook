<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class Encyclopedia extends Component
{

    public int $pageSize = -1;
    public string $equipmentType = "Amulette";
    public ?string $stuffName = null;
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
    public array $equipmentTranslate = [
        "Amulette" => "amulet_id",
        "Bouclier" => "shield_id",
        "Anneau" => ["ring_1_id", "ring_2_id"],
        "Ceinture" => "belt_id",
        "Bottes" => "boots_id",
        "Chapeau" => "hat_id",
        "Cape" => "cape_id",
        "Dofus" => [
            "dofus_1_id",
            "dofus_2_id",
            "dofus_3_id",
            "dofus_4_id",
            "dofus_5_id",
            "dofus_6_id"],
        "Familier" => "animal_id",
        "Montilier" => "animal_id",
        "Dragodinde" => "mount_id",
        "Muldo" => "mount_id",
        "Volkorne" => "mount_id",
        "Arc" => "weapon_id",
        "Baguette" => "weapon_id",
        "Bâton" => "weapon_id",
        "Épée" => "weapon_id",
        "Faux" => "weapon_id",
        "Hache" => "weapon_id",
        "Lance" => "weapon_id",
        "Marteau" => "weapon_id",
        "Pelle" => "weapon_id",
        "Pioche" => "weapon_id",
        "Trophée" => [
            "dofus_1_id",
            "dofus_2_id",
            "dofus_3_id",
            "dofus_4_id",
            "dofus_5_id",
            "dofus_6_id"],
        "Prysmaradite" => [
            "dofus_1_id",
            "dofus_2_id",
            "dofus_3_id",
            "dofus_4_id",
            "dofus_5_id",
            "dofus_6_id"],
    ];

    public array $items;
    public array $itemsToView;
    public int $itemsToLoad = 24;
    public string $equipmentOrMounts = "items/equipment";
    public int $minLvl = 1;
    public int $maxLvl = 200;

    public function mount()
    {
        $this->equipmentOrMounts = request()->query->get("equipmentOrMounts") ?? "items/equipment";
        $this->equipmentType = request()->query->get("equipementType") ?? "Amulette";
        $this->maxLvl = request()->query->get("maxLvl") ?? 200;
        $this->updateItems();
    }

    public function updateItemsToLoad()
    {
        $this->itemsToLoad += 24;
        $this->updateItemsToView();
    }

    public function updateItemsToView()
    {
        $this->itemsToView = array_slice($this->items, 0, $this->itemsToLoad);
    }

    public function updateEquipmentType(string $equipmentOrMounts, string $equipmentType)
    {
        if ($this->equipmentType != $equipmentType) {
            $this->equipmentType = $equipmentType;
            $this->equipmentOrMounts = $equipmentOrMounts;
            $this->updateItems();
        } elseif (!is_null($this->stuffName) && $this->stuffName !== "") {
            $this->equipmentType = "";
            $this->equipmentOrMounts = "both";
            $this->updateItems();
        }
    }

    private function updateItems()
    {
        if ($this->equipmentOrMounts === "items/equipment") {
            $sort = "sort%5Blevel%5D=desc";
            $typeName = "&filter%5Btype_name%5D=" . $this->equipmentType;
            $fieldsItem = "&fields%5Bitem%5D=parent_set,effects";
            $minLvl = "&filter%5Bmin_level%5D=" . $this->minLvl;
            $maxLvl = "&filter%5Bmax_level%5D=" . $this->maxLvl;
        } elseif ($this->equipmentOrMounts === "mounts") {
            $sort = "";
            $typeName = "&filter%5Bfamily_name%5D=" . $this->equipmentType;
            $fieldsItem = "&fields%5Bmount%5D=effects";
            $minLvl = "";
            $maxLvl = "";
        }
        if (is_null($this->stuffName) || $this->stuffName === "") {
            $request = Http::get('https://api.dofusdu.de/dofus2/fr/' . $this->equipmentOrMounts . '?' . $sort . $typeName . '&page%5Bsize%5D=' . $this->pageSize . $fieldsItem . $minLvl . $maxLvl)->json();
            $generalResult = !is_null($request) ? ($this->equipmentOrMounts === "items/equipment" ? $request['items'] : $request['mounts']) : [];
            $this->items = $generalResult;
            $this->updateItemsToView();
            return;

        }
        $items = [];
        $mounts = [];
        if ($this->equipmentOrMounts === "items/equipment" || $this->equipmentOrMounts === "both") {
            $items = Http::get('https://api.dofusdu.de/dofus2/fr/items/equipment?sort%5Blevel%5D=desc&filter%5Btype_name%5D=' . $this->equipmentType . '&page%5Bsize%5D=-1&fields%5Bitem%5D=parent_set,effects&filter%5Bmin_level%5D=' . $this->minLvl . "&filter%5Bmax_level%5D=" . $this->maxLvl)->json()['items'];
        }
        if ($this->equipmentOrMounts === "mounts" || $this->equipmentOrMounts === "both") {
            $mounts = Http::get('https://api.dofusdu.de/dofus2/fr/mounts?page%5Bsize%5D=-1&fields%5Bmount%5D=effects&filter%5Bfamily_name%5D=' . $this->equipmentType)->json()['mounts'];
        }
        $generalResult = array_merge($items, $mounts);
        $cpt = 0;
        foreach ($generalResult as $item) {
            $itemIsCertificate =
                array_key_exists('type', $item) &&
                (str_contains($item['type']['name'], 'Certificat') ||
                    str_contains($item['type']['name'], ' Percepteur'));

            if (!str_contains(strtolower($item['name']), $this->stuffName) || $itemIsCertificate) {
                array_splice($generalResult, $cpt, 1);
            } else {
                $cpt++;
            }
        }
        $this->items = $generalResult;
        $this->updateItemsToView();
    }

    public function updateStuffName(string $stuffName)
    {
        $this->stuffName = $stuffName;
        $this->updateItems();
    }

    public function deleteFilters()
    {
        $this->minLvl = 1;
        $this->maxLvl = 200;
        $this->pageSize = -1;
        $this->equipmentType = "Amulette";
        $this->stuffName = null;
        $this->equipmentOrMounts = "items/equipment";
        $this->updateItems();
    }

    public function updateMinLvl(int $minLvl)
    {
        $this->minLvl = $minLvl;
        $this->updateItems();
    }

    public function updateMaxLvl(int $maxLvl)
    {
        $this->maxLvl = $maxLvl;
        $this->updateItems();
    }

    public function addItemToStuff(int $item_id)
    {
        $stuff = session()->get('stuff');
        unset($stuff->class_slug);
        if (!is_null($stuff)) {
            $databaseEquipmentName = $this->equipmentTranslate[$this->equipmentType];
            if (!is_array($databaseEquipmentName)) {
                if ($databaseEquipmentName === "mount_id") {
                    $stuff->animal_id = null;
                }
                if ($databaseEquipmentName === "animal_id") {
                    $stuff->mount_id = null;
                }
                $stuff->{$databaseEquipmentName} = $item_id;
                $stuff->save();
                return redirect()->route('stuff.show', $stuff->id);
            }

            foreach ($databaseEquipmentName as $itemEmplacement) {
                if (is_null($stuff->{$itemEmplacement})) {
                    $stuff->{$itemEmplacement} = $item_id;
                    $stuff->save();
                    return redirect()->route('stuff.show', $stuff->id);
                }
            }

            return redirect()->route('stuff.show', $stuff->id);
        }
    }

    public function render(): View
    {
        return view('livewire.encyclopedia');
    }


}
