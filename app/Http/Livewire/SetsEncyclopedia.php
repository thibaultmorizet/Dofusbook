<?php

namespace App\Http\Livewire;

use App\Models\Sets;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class SetsEncyclopedia extends Component
{
    public Collection $sets;
    public Collection $setsToView;
    public int $setsLoaded = 24;
    public ?string $setName = null;
    public int $minLvl = 1;
    public int $maxLvl = 200;
    public int $totalSetsNumber;
    protected $listeners = [
        'updateNameFilter',
        'updateMinLvlFilter',
        'updateMaxLvlFilter',
        'deleteFilters'
    ];

    public function mount()
    {
        $this->setsToView = $this->updateSets();
    }

    private function countSets(): int
    {
        return Sets::query()
            ->where("name", "like", "%$this->setName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->count();
    }

    public function updateSetsToLoad()
    {
        $this->sets = $this->updateSetsToView();
        $this->setsLoaded += 24;
        $this->setsToView = $this->setsToView->merge($this->sets);
        $this->totalSetsNumber = $this->countSets();
    }

    private function updateSets(): Collection|array
    {
        $this->setsLoaded = 24;
        $this->totalSetsNumber = $this->countSets();
        return Sets::query()
            ->with(['items', 'items.type', 'effects'])
            ->where("name", "like", "%$this->setName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24)
            ->get();
    }

    private function updateSetsToView(): Collection|array
    {
        return Sets::query()
            ->with(['items', 'items.type', 'effects'])
            ->where("name", "like", "%$this->setName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24)
            ->offset($this->setsLoaded)
            ->get();
    }

    public function updateNameFilter($setName)
    {
        $this->setName = $setName;
        $this->updateSetsVariable();
    }

    public function updateMinLvlFilter($minLvl)
    {
        $this->minLvl = $minLvl;
        $this->updateSetsVariable();
    }

    public function updateMaxLvlFilter($maxLvl)
    {
        $this->maxLvl = $maxLvl;
        $this->updateSetsVariable();
    }

    public function deleteFilters($minLvl, $maxLvl, $setName)
    {
        $this->minLvl = $minLvl;
        $this->maxLvl = $maxLvl;
        $this->setName = $setName;
        $this->updateSetsVariable();
    }

    public function updateSetsVariable()
    {
        $this->setsToView = $this->updateSets();
    }

    public function render(): View
    {
        return view('livewire.sets-encyclopedia');
    }


}
