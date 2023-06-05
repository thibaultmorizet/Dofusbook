<?php

namespace App\Http\Livewire;

use App\Http\Trait\SpellTrait;
use LivewireUI\Modal\ModalComponent;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class OpenReplacementModal extends ModalComponent
{
    use SpellTrait;

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
        session()->put('stuff', $stuff);
        $this->loadEffectsByStuff($stuff);

        return redirect()->route('stuff.show', $stuff->id);
    }

    function render()
    {
        return view('livewire.open-replacement-modal');
    }
}
