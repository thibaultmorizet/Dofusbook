<?php

namespace App\Http\Livewire\Set;

use App\Models\Sets;
use Illuminate\View\View;
use Livewire\Component;

class HeaderSet extends Component
{
    public ?string $setName = "";
    public int $minLvl = 1;
    public int $maxLvl = 200;

    public function mount()
    {
        $this->setName = request()->query->get("setName") ?? $this->setName;
        $this->maxLvl = request()->query->get("maxLvl") ?? $this->maxLvl;
    }

    public function updateSetName(string $setName)
    {
        $this->setName = $setName;
        $this->emit('updateNameFilter', $this->setName);
    }

    public function deleteFilters()
    {
        $this->minLvl = 1;
        $this->maxLvl = 200;
        $this->setName = null;
        $this->emit(
            'deleteFilters',
            $this->minLvl,
            $this->maxLvl,
            $this->setName
        );
    }

    public function updateMinLvl(int $minLvl)
    {
        $this->minLvl = $minLvl;
        $this->emit('updateMinLvlFilter', $this->minLvl);
    }

    public function updateMaxLvl(int $maxLvl)
    {
        $this->maxLvl = $maxLvl;
        $this->emit('updateMaxLvlFilter', $this->maxLvl);
    }

    public function render(): View
    {
        return view('livewire.set.header-set');
    }


}
