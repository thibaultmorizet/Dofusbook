<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class Encyclopedia extends Component
{

    public int $page = 1;
    public int $page_size = 24;
    public string $equipment_type = "Amulette";
    public array $equipment_trad = [
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
    public int $last_page;
    public array $items;
    public string $equipment_or_mounts = "items/equipment";

    public function mount()
    {
        if (request()->equipment_or_mounts) {
            $this->equipment_or_mounts = request()->equipment_or_mounts;
        }
        if (request()->equipment_type) {
            $this->equipment_type = request()->equipment_type;
        }
        $this->page_size = $this->equipment_type === "Montilier" ? "-1" : $this->page_size;
    }

    public function gotoPage(int $page)
    {
        if ($page >= 1 && $page <= $this->last_page) {
            $this->page = $page;
            $this->updateItems();
        }
    }

    public function previousPage()
    {
        if ($this->page > 1) {
            $this->page -= 1;
            $this->updateItems();
        }
    }

    public function nextPage()
    {
        if ($this->page < $this->last_page) {
            $this->page += 1;
            $this->updateItems();
        }
    }


    private function updateItems()
    {
        $sort = $this->equipment_or_mounts === "items/equipment" ? "sort%5Blevel%5D=desc" : "";
        $type_name = $this->equipment_or_mounts === "items/equipment" ? "filter%5Btype_name%5D=" . $this->equipment_type : "filter%5Bfamily_name%5D=" . $this->equipment_type;
        $fields_item = $this->equipment_or_mounts === "items/equipment" ? "fields%5Bitem%5D=parent_set,effects" : "fields%5Bmount%5D=effects";

        $request = Http::get('https://api.dofusdu.de/dofus2/fr/' . $this->equipment_or_mounts . '?' . $sort . '&' . $type_name . '&page%5Bsize%5D=' . $this->page_size . '&page%5Bnumber%5D=' . $this->page . '&' . $fields_item)->json();
        $links = $request['_links'];
        if (array_key_exists("last", $links)) {
            $prefix = "page%5Bnumber%5D%3D";
            $suffix = "%26page%5Bsize%5D%3D";
            $start_pos_page_number = strpos($links["last"], $prefix) + strlen($prefix);
            $end_pos_page_number = strpos($links["last"], $suffix);
            $this->last_page = $this->equipment_type === "Montilier" ? "1" : substr($links["last"], $start_pos_page_number, $end_pos_page_number - $start_pos_page_number);
        }
        $this->items = $this->equipment_or_mounts === "items/equipment" ? $request['items'] : $request['mounts'];
    }

    public function render(): View
    {
        $this->updateItems();
        return view('livewire.encyclopedia', ['equipment_type' => $this->equipment_type]);
    }


}
