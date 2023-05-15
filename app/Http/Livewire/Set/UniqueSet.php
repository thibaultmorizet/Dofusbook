<?php

namespace App\Http\Livewire\Set;

use App\Models\Sets;
use Illuminate\View\View;
use Livewire\Component;
use Ramsey\Collection\Collection;

class UniqueSet extends Component
{
    public array $effectsToView;
    public Sets $set;

    public function mount()
    {
        $this->loadEffectsBySet($this->set);
    }

    public function updateEffectsToView(int $effectsToView)
    {
        $this->effectsToView["set_number_items"] = $effectsToView;
    }

    public function loadEffectsBySet($set)
    {
        foreach ($set->effects as $anEffect) {
            $this->effectsToView["effects"][] = $anEffect->toArray();
        }
        $this->effectsToView["set_number_items"] = $set->number_of_items;

    }

    public function goToItem(string $itemName, string $itemTypeName)
    {
        return redirect()->route('encyclopedia', ['itemName' => $itemName, 'equipementType' => $itemTypeName]);

    }

    public function goToSet(string $setName)
    {
        return redirect()->route('sets-encyclopedia', ['setName' => $setName]);
    }

    public function render(): View
    {
        return view('livewire.set.unique-set');
    }


}
