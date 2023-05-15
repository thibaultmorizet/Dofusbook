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
        $this->updateFilters();
    }

    public function deleteFilters()
    {
        $this->minLvl = 1;
        $this->maxLvl = 200;
        $this->setName = null;
        $this->updateFilters();
    }

    public function updateMinLvl(int $minLvl)
    {
        $this->minLvl = $minLvl;
        $this->updateFilters();
    }

    public function updateMaxLvl(int $maxLvl)
    {
        $this->maxLvl = $maxLvl;
        $this->updateFilters();
    }

    public function updateFilters()
    {
        $this->emit('updateFilters',
            $this->minLvl,
            $this->maxLvl,
            $this->setName
        );
    }

    public function render(): View
    {
        return view('livewire.set.header-set');
    }


}
