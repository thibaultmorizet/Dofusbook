<?php

namespace App\Http\Livewire;

use App\Http\Trait\ItemsEncyclopediaTrait;
use App\Http\Trait\RedirectionTrait;
use App\Http\Trait\StuffTrait;
use App\Models\Types;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ItemsEncyclopedia extends Component
{
    use withPagination;
    use ItemsEncyclopediaTrait;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function mount()
    {
        $this->equipmentTypeName = request()->query->get("equipementType") ?? "Amulette";
        $this->stuffName = request()->query->get("itemName") ?? null;
        $this->equipmentType = Types::query()->where("name", "=", $this->equipmentTypeName)->get()->first();
        $this->maxLvl = request()->query->get("maxLvl") ?? 200;
        $this->itemsToView = $this->updateItems();
        if (!is_null(session()->get('stuff'))) {
            $this->stuff = session()->get('stuff');
        }
    }


    public function render(): View
    {
        return view('livewire.items-encyclopedia');
    }

}
