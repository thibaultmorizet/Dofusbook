<?php

namespace App\Http\Livewire\Item;

use App\Models\Items;
use Illuminate\View\View;
use Livewire\Component;

class HeaderItem extends Component
{

    public string $equipmentTypeName;
    public bool $primaryFilterTabIsOpen = false;
    public bool $secondaryFilterTabIsOpen = false;
    public bool $dommagesFilterTabIsOpen = false;
    public bool $resistancesFilterTabIsOpen = false;
    public ?string $stuffName = null;
    public int $minLvl = 1;
    public int $maxLvl = 200;

    public function mount()
    {
        $this->stuffName = request()->query->get("itemName") ?? null;
        $this->maxLvl = request()->query->get("maxLvl") ?? 200;
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
        $this->characteristicsFilters = [];
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

    public function render(): View
    {
        return view('livewire.item.header-item');
    }


}
