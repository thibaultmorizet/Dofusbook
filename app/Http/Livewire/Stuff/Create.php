<?php

namespace App\Http\Livewire\Stuff;

use App\Http\Trait\RedirectionTrait;
use App\Http\Trait\StuffTrait;
use App\Models\Stuffs;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    use StuffTrait;
    use RedirectionTrait;


    public function mount(Stuffs $stuff)
    {
        $this->stuff = $stuff;
    }

    public function render(): View
    {
        $this->getStuffDetail();
        $this->getSetLinks();
        return view('livewire.stuff.create');
    }
}
