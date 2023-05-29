<?php

namespace App\Http\Livewire\Stuff;

use App\Http\Controllers\StuffController;
use App\Http\Trait\StuffTrait;
use App\Models\Items;
use App\Models\Stuffs;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    use StuffTrait;

    public array $stuffDetail = [
        'amulet' => null,
        'shield' => null,
        'ring_1' => null,
        'ring_2' => null,
        'belt' => null,
        'boots' => null,
        'hat' => null,
        'cape' => null,
        'dofus_1' => null,
        'dofus_2' => null,
        'dofus_3' => null,
        'dofus_4' => null,
        'dofus_5' => null,
        'dofus_6' => null,
        'animal' => null,
        'weapon' => null
    ];

    public array $setLinks = [
    ];

    public function mount(Stuffs $stuff)
    {
        $this->stuff = self::getStuff($stuff->id);
    }

    public function getStuffDetail(): void
    {
        foreach (array_keys($this->stuffDetail) as $aStuffItem) {
            $item_id = $this->stuff->{$aStuffItem . '_id'};
            if (!is_null($item_id)) {
                $this->stuffDetail[$aStuffItem] = Items::query()->with(['effects','set'])->where("id", $item_id)->get()->first()->toArray();
            } else {
                $this->stuffDetail[$aStuffItem] = null;
            }
        }
    }

    private function getSetLinks(): void
    {
        $this->setLinks = [];
        foreach ($this->stuffDetail as $item) {
            if (!is_null(Arr::get($item, "set"))) {
                $this->setLinks[Arr::get(Arr::get($item, "set")??[],'id')][] = $item;
            }
        }
        foreach ($this->setLinks as $index => $setLink) {
            if (count($setLink) <= 1) {
                unset($this->setLinks[$index]);
            }
        }
    }

    public function render(): View
    {
        $this->getStuffDetail();
        $this->getSetLinks();
//        $this->resetItemsCharacteristics();
        return view('livewire.stuff.create');
    }
}
