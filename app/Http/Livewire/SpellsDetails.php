<?php

namespace App\Http\Livewire;

use App\Models\Spells;
use App\Models\Stuffs;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class SpellsDetails extends Component
{

    public array $spellsGroups;
    public Stuffs $stuff;
    public ?int $selectedSpellsGroup = null;
    public string $dommageEffectType = "calculatedEffects";
    public Collection $allSpells;
    public Collection $spellsToView;


    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function mount()
    {
        $this->stuff = $this->getStuff();
//        $allSpells = ;
        $this->allSpells = Spells::query()
            ->where("class_id", "=", $this->stuff->class_id)
            ->orWhereNull("class_id")
            ->orderBy("spell_group")
            ->get();
        $this->spellsToView = $this->allSpells;
        $this->spellsGroups = $this->allSpells
            ->groupBy("spell_group")
            ->toArray();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    private function getStuff()
    {
        if (($stuff = session()->get("stuff")) !== null) {
            return $stuff;
        }
        $temporaryStuff = new Stuffs();
        $temporaryStuff->class_id = 1;
        $temporaryStuff->gender = "male";
        return $temporaryStuff;
    }

    public function updateSelectedSpellsgroup(int $spellsGroup)
    {
        if ($this->selectedSpellsGroup == $spellsGroup) {
            $this->selectedSpellsGroup = null;
            $this->spellsToView = $this->allSpells;
            return;
        }
        $this->selectedSpellsGroup = $spellsGroup;
        $this->spellsToView = new Collection();
        foreach ($this->allSpells as $spell) {
            if (Arr::get($spell, "spell_group") === $this->selectedSpellsGroup) {
                $this->spellsToView->push($spell);
            }
        }

    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function render(): View
    {
        $this->stuff = $this->getStuff();
        return view('livewire.spells-details');
    }
}
