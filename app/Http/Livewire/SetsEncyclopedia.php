<?php

namespace App\Http\Livewire;

use App\Models\Effects;
use App\Models\Sets;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class SetsEncyclopedia extends Component
{
    public ?string $setName = null;
    public Collection $sets;
    public Collection $setsToView;
    public int $setsLoaded = 24;
    public int $minLvl = 1;
    public int $maxLvl = 200;
    public int $totalSetsNumber;

    public function mount()
    {
        $this->setName = request()->query->get("setName") ?? "";
        $this->maxLvl = request()->query->get("maxLvl") ?? 200;
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
        $result = Sets::query()
            ->with(['items', 'items.type', 'effects'])
            ->where("name", "like", "%$this->setName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24)
            ->get();
        return $result;
    }

    private function updateSetsToView(): Collection|array
    {
        $result = Sets::query()
            ->with(['items', 'items.type', 'effects'])
            ->where("name", "like", "%$this->setName%")
            ->where("level", ">=", $this->minLvl)
            ->where("level", "<=", $this->maxLvl)
            ->orderByDesc("level")
            ->orderBy("id")
            ->limit(24)
            ->offset($this->setsLoaded)
            ->get();
        return $result;
    }

    public function updateSetName(string $setName)
    {
        $this->setName = $setName;
        $this->setsToView = $this->updateSets();
    }

    public function deleteFilters()
    {
        $this->minLvl = 1;
        $this->maxLvl = 200;
        $this->setName = null;
        $this->setsToView = $this->updateSets();
    }

    public function updateMinLvl(int $minLvl)
    {
        $this->minLvl = $minLvl;
        $this->setsToView = $this->updateSets();
    }

    public function updateMaxLvl(int $maxLvl)
    {
        $this->maxLvl = $maxLvl;
        $this->setsToView = $this->updateSets();
    }

    public function render(): View
    {
        return view('livewire.sets-encyclopedia');
    }


}
