<?php

namespace App\Http\Livewire;

use App\Models\Items;
use App\Models\Types;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Livewire\WithPagination;

class Encyclopedia extends Component
{
    use withPagination;

    public string $equipmentTypeName;
    public Types $equipmentType;
    public ?string $stuffName = null;
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

    public Collection $items;
    public Collection $itemsToView;
    public int $itemsLoaded = 24;
    public int $minLvl = 1;
    public int $maxLvl = 200;
    public int $totalItemsNumber;
    public bool $returnReplacementModal = false;
    public array $itemsToReplace = [];

    public function mount()
    {
        $this->equipmentTypeName = request()->query->get("equipementType") ?? "Amulette";
        $this->stuffName = request()->query->get("itemName") ?? null;
        $this->equipmentType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
        $this->maxLvl = request()->query->get("maxLvl") ?? 200;
        $this->itemsToView = $this->updateItems();
        $this->totalItemsNumber = $this->countItems();
        $this->isReturnReplacementModal();
    }

    public function updateEquipmentType(string $equipmentTypeName)
    {
        if ($this->equipmentTypeName != $equipmentTypeName) {
            $this->equipmentTypeName = $equipmentTypeName;
            $newType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
            if ($newType !== false) {
                $this->equipmentType = $newType;
                $this->itemsToView = $this->updateItems();
            }
        }
    }

    public function updateItemsToLoad()
    {
        $this->items = $this->updateItemsToView();
        $this->itemsLoaded += 24;
        $this->itemsToView = $this->itemsToView->merge($this->items);
    }

    private function countItems()
    {
        return Items::query()
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%{$this->stuffName}%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->count();

    }

    private function updateItemsToView()
    {
        return Items::query()
            ->with(['type', 'effects', 'conditions'])
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%{$this->stuffName}%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24)
            ->offset($this->itemsLoaded)
            ->get();
    }

    private function updateItems()
    {
        $this->isReturnReplacementModal();

        $this->itemsLoaded = 24;
        return Items::query()
            ->with(['type', 'effects', 'conditions'])
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%{$this->stuffName}%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24)
            ->get();
    }

    public function updateStuffName(string $stuffName)
    {
        $this->stuffName = $stuffName;
        $this->itemsToView = $this->updateItems();
    }

    public function deleteFilters()
    {
        $this->minLvl = 1;
        $this->maxLvl = 200;
        $this->equipmentTypeName = "Amulette";
        $this->equipmentType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
        $this->stuffName = null;
        $this->itemsToView = $this->updateItems();
    }

    public function updateMinLvl(int $minLvl)
    {
        $this->minLvl = $minLvl;
        $this->itemsToView = $this->updateItems();
    }

    public function updateMaxLvl(int $maxLvl)
    {
        $this->maxLvl = $maxLvl;
        $this->itemsToView = $this->updateItems();
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
        }
        return false;
    }

    public function goToSet(string $setName)
    {
        return redirect()->route('sets-encyclopedia', ['setName' => $setName]);
    }

    private function isReturnReplacementModal(): void
    {
        $this->itemsToReplace = [];
        $stuff = session()->get('stuff');
        if (!is_null($stuff)) {
            $databaseEquipmentName = $this->equipmentTranslate[$this->equipmentTypeName];
            if (is_array($databaseEquipmentName)) {
                foreach ($databaseEquipmentName as $itemEmplacement) {
                    if (is_null($stuff->{$itemEmplacement})) {
                        $this->returnReplacementModal = false;
                        $this->itemsToReplace = [];
                        return;
                    }
                }
                foreach ($databaseEquipmentName as $itemEmplacement) {
                    $this->itemsToReplace[$itemEmplacement] = Items::query()->find($stuff->{$itemEmplacement});
                }
                $this->returnReplacementModal = true;
                return;

            }
        }
        $this->returnReplacementModal = false;
        $this->itemsToReplace = [];
    }

    public function render(): View
    {
        return view('livewire.encyclopedia');
    }

}
