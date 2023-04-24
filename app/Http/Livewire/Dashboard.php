<?php

namespace App\Http\Livewire;

use App\Models\Stuff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

    public function mount()
    {
    }

    public function render(): View
    {
        $stuffList = Stuff::query()
            ->select('*', 'stuffs.id as stuff_id')
            ->where("user_id", Auth::user()->id)
            ->join('classes', function ($join) {
                $join->on('stuffs.class_id', '=', 'classes.id');
            })->get();
        foreach ($stuffList as $stuff) {
            foreach (array_keys($this->stuffDetail) as $aStuffItem) {
                $item_id = $stuff->{$aStuffItem . '_id'};
                if (!is_null($item_id)) {
                    if ($aStuffItem === "mount") {
                        $stuff[$aStuffItem] = $this->getItemByTypeAndId($item_id, "mounts/");
                    } else {
                        $stuff[$aStuffItem] = $this->getItemByTypeAndId($item_id);
                    }
                }
            }

        }
        return view('livewire.dashboard', ['stuffList' => $stuffList]);
    }

    private function getItemByTypeAndId(int $item_id, string $equipmentOrMounts = "items/equipment/")
    {
        return Http::get('https://api.dofusdu.de/dofus2/fr/' . $equipmentOrMounts . $item_id)->json();
    }

    public function goToStuffEdit(int $stuff_id)
    {
        return redirect()->route('stuff.show', $stuff_id);
    }

}
