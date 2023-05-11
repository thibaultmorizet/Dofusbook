<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class OpenReplacementModal extends ModalComponent
{
    public string $itemType;
    public array $items;
    public int $newItemId;

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
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
