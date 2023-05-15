<?php

namespace App\Http\Livewire;

use App\Models\Items;
use App\Models\Types;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use Livewire\WithPagination;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ItemsEncyclopedia extends Component
{
    use withPagination;

    public string $equipmentTypeName;
    public Types $equipmentType;
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

    public Collection $itemsToView;
    public int $itemsLoaded = 24;
    public ?string $stuffName = null;
    public int $minLvl = 1;
    public int $maxLvl = 200;
    public int $totalItemsNumber;
    public array $itemsToReplace = [];
    public array $characteristicsFilters = [];

    public function mount()
    {
        $this->equipmentTypeName = request()->query->get("equipementType") ?? "Amulette";
        $this->equipmentType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
        $this->itemsToView = $this->updateItems();
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
        $this->itemsToView = $this->itemsToView->merge($this->updateItemsToView());
        $this->itemsLoaded += 24;
        $this->totalItemsNumber = $this->countItems();
    }

    private function countItems(): int
    {
        $result = Items::query()
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%$this->stuffName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl);
        foreach ($this->characteristicsFilters as $aCharacteristicFilter) {
            $result->whereHas('effects', function (Builder $query) use ($aCharacteristicFilter) {
                $query
                    ->where('name', '=', $aCharacteristicFilter)
                    ->where(function ($q) {
                        $q->where('int_maximum', '>=', '1')
                            ->orWhere('int_minimum', '>=', '1');
                    });
            });
        }
        return $result->count();
    }

    private function updateItemsToView(): Collection|array
    {
        $result = Items::query()
            ->with(['type', 'effects', 'conditions'])
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%$this->stuffName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24)
            ->offset($this->itemsLoaded);
        foreach ($this->characteristicsFilters as $aCharacteristicFilter) {
            $result->whereHas('effects', function (Builder $query) use ($aCharacteristicFilter) {
                $query
                    ->where('name', '=', $aCharacteristicFilter)
                    ->where(function ($q) {
                        $q->where('int_maximum', '>=', '1')
                            ->orWhere('int_minimum', '>=', '1');
                    });
            });
        }

        return $result->get();

    }

    private function updateItems(): Collection|array
    {
        $this->isReturnReplacementModal();

        $this->itemsLoaded = 24;
        $this->totalItemsNumber = $this->countItems();
        $result = Items::query()
            ->with(['type', 'effects', 'conditions'])
            ->where("type_id", "=", $this->equipmentType->id)
            ->where("name", "like", "%$this->stuffName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24);
       foreach ($this->characteristicsFilters as $aCharacteristicFilter) {
            $result->whereHas('effects', function (Builder $query) use ($aCharacteristicFilter) {
                $query
                    ->where('name', '=', $aCharacteristicFilter)
                    ->where(function ($q) {
                        $q->where('int_maximum', '>=', '1')
                            ->orWhere('int_minimum', '>=', '1');
                    });
            });
        }

        return $result->get();
    }


    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
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


    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
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

    public function updateCharacteristicsFilters(string $characteristicName)
    {

        if (($key = array_search($characteristicName, $this->characteristicsFilters)) === false) {
            $this->characteristicsFilters[] = $characteristicName;
        } else {
            unset($this->characteristicsFilters[$key]);
        }
        $this->itemsToView = $this->updateItems();
    }

    public function toggleFilterTab(string $tabName)
    {
        $this->{$tabName . "FilterTabIsOpen"} = !$this->{$tabName . "FilterTabIsOpen"};
    }

    public function render(): View
    {
        return view('livewire.items-encyclopedia');
    }

}
