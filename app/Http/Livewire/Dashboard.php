<?php

namespace App\Http\Livewire;

use App\Models\Items;
use App\Models\Stuffs;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
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
        'mount' => null,
        'weapon' => null
    ];
    private array $itemLoaded = [
    ];

    public function mount()
    {
    }

    public function render(): View
    {
        $stuffList = Stuffs::query()
            ->with("class")
            ->where("user_id", Auth::user()->id)
            ->get();
        foreach ($stuffList as $stuff) {
            foreach (array_keys($this->stuffDetail) as $aStuffItem) {
                $item_id = $stuff->{$aStuffItem . '_id'};
                if (!is_null($item_id)) {
                    if (is_null(Arr::get($this->itemLoaded, $item_id))) {
                        $this->itemLoaded[$item_id] = Items::query()->where("id", "=", $item_id)->first();
                    }
                    $stuff[$aStuffItem] = $this->itemLoaded[$item_id];
                }
            }

        }
        return view('livewire.dashboard', ['stuffList' => $stuffList]);
    }


    public function goToStuffEdit(int $stuff_id)
    {
        return redirect()->route('stuff.show', $stuff_id);
    }

}
