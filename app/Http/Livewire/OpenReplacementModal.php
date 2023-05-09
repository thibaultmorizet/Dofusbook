<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class OpenReplacementModal extends ModalComponent
{
    public string $itemType;
    public array $items;
    public int $newItemId;

    public function replaceItem(string $itemToReplace)
    {
        $stuff = session()->get('stuff');
        $stuff->{$itemToReplace} = $this->newItemId;
        $stuff->save();
        return redirect()->route('stuff.show', $stuff->id);
    }

    function render()
    {
        return view('livewire.open-replacement-modal');
    }
}
