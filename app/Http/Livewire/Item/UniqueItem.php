<?php

namespace App\Http\Livewire\Item;

use App\Models\Items;
use Illuminate\View\View;
use Livewire\Component;

class UniqueItem extends Component
{
    public Items $item;
    public bool $returnReplacementModal = false;

    public function mount()
    {
    }
    public function goToSet(string $setName)
    {
        return redirect()->route('sets-encyclopedia', ['setName' => $setName]);
    }

    public function render(): View
    {
        return view('livewire.item.unique-item');
    }


}
