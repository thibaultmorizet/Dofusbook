<?php

namespace App\Http\Livewire;

use App\Models\Sets;
use App\Models\Types;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class SetsEncyclopedia extends Component
{
    public string $equipmentTypeName;
    public Types $equipmentType;
    public ?string $setName = null;
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
        "Dragodinde" => "animal_id",
        "Muldo" => "animal_id",
        "Volkorne" => "animal_id",
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

    public Collection $sets;
    public Collection $setsToView;
    public int $setsToLoad = 24;
    public int $minLvl = 1;
    public int $maxLvl = 200;
    public array $effectsToView;

    public function mount()
    {
        $this->equipmentTypeName = request()->query->get("equipementType") ?? "Amulette";
        $this->equipmentType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
        $this->maxLvl = request()->query->get("maxLvl") ?? 200;
        $this->updateItems();
        foreach ($this->sets as $set) {
            $this->effectsToView[$set->id] = $set->number_of_items;
        }
    }

    public function updateEffectsToView(int $setId, int $effectsToView)
    {
        $this->effectsToView[$setId] = $effectsToView;
    }

    public function updateItemsToLoad()
    {
        $this->setsToLoad += 24;
        $this->updateItemsToView();
    }


    public function updateEquipmentType(string $equipmentTypeName)
    {
        if ($this->equipmentTypeName != $equipmentTypeName) {
            $this->equipmentTypeName = $equipmentTypeName;
            $newType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
            if ($newType !== false) {
                $this->equipmentType = $newType;
                $this->updateItems();
            }
        }
    }

    private function updateItems()
    {
        $this->sets = Sets::query()
            ->with(['items', 'items.type', 'effects'])
            ->where("name", "like", "%{$this->setName}%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->get();
    }

    public function updateSetName(string $setName)
    {
        $this->setName = $setName;
        $this->updateItems();
    }

    public function deleteFilters()
    {
        $this->minLvl = 1;
        $this->maxLvl = 200;
        $this->equipmentTypeName = "Amulette";
        $this->equipmentType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
        $this->setName = null;
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
        if (!is_null($stuff)) {
            $databaseEquipmentName = $this->equipmentTranslate[$this->equipmentTypeName];
            if (!is_array($databaseEquipmentName)) {
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
        return false;
    }

    public function render(): View
    {
        return view('livewire.sets-encyclopedia');
    }


}
