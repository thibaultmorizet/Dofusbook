<?php

namespace App\Http\Livewire\Spell;

use App\Models\Sets;
use App\Models\Spells;
use Illuminate\View\View;
use Livewire\Component;

class UniqueSpell extends Component
{
    public array $effectsToView;
    public Spells $spell;

    public function mount()
    {
        $this->loadEffectsBySpell($this->spell);
    }

    public function updateEffectsToView(int $spellLevel)
    {
        $this->effectsToView["spell_level"] = $spellLevel;
    }

    public function loadEffectsBySpell($spell)
    {
//        foreach ($spell->effects as $anEffect) {
//            $this->effectsToView["effects"][] = $anEffect->toArray();
//        }
        $this->effectsToView["spell_level"] = count($spell->spellCharacteristics);

    }

    public function render(): View
    {
        return view('livewire.spell.unique-spell');
    }


}
