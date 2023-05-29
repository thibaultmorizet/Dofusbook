<?php

namespace App\Http\Livewire\Spell;

use App\Models\Sets;
use App\Models\Spells;
use App\Models\Stuffs;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Livewire\Component;

class UniqueSpell extends Component
{
    public array $spellInfo;
    public Spells $spell;
    public Stuffs $stuff;
    public string $dommageEffectType;
    public array $effectTranslation = [
        "dt" => "strength",
        "de" => "luck",
        "df" => "intel",
        "da" => "agility",
        "pif" => "intel",
        "pia" => "agility",
        "pie" => "luck",
        "pit" => "strength",
        "pou" => "do_push",
        "dn" => "neutral",
        "vn" => "neutral",
        "ve" => "luck",
        "vt" => "strength",
        "vf" => "intel",
        "pve" => "luck",
        "dse" => "luck",
        "vc" => "luck",
        "vi" => "intel",
        "va" => "agility",
    ];

    public function mount()
    {
        $this->loadEffectsBySpell($this->spell);
    }

    public function updateEffectsToView(int $spellLevel)
    {
        $this->spellInfo["spell_level"] = $spellLevel;
        $this->updateSelectedLevel($spellLevel);
    }

    public function updateSelectedLevel(int $levelIndex)
    {
        $this->spellInfo["selected_level"] = $this->spell->{"level$levelIndex"};
    }

    public function loadEffectsBySpell($spell)
    {
        $this->spellInfo["spell_level"] = count($spell->spellCharacteristics);
        $this->spellInfo["selected_level"] = $spell->{"level" . count($spell->spellCharacteristics)};
        $this->spellInfo["cac_or_dist"] = "cac";

        foreach ($spell->dommageGroups as $index => $dommageGroup) {
            $this->spellInfo["dommage_groups"][$index]["order"] = $dommageGroup->order;
            $this->spellInfo["dommage_groups"][$index]["title"] = $dommageGroup->title === "" ? "Dégâts" : $dommageGroup->title;

            foreach ($dommageGroup->spellEffects as $effectIndex => $spellEffect) {
                if (is_null(Arr::get($this->effectTranslation, $spellEffect->effect))) {
                    dd($spell->name, $spellEffect->effect, $dommageGroup->spellEffects);
                }
                $this->spellInfo["dommage_groups"][$index]["effects"][$effectIndex]["level"] = $spellEffect->level;
                $this->spellInfo["dommage_groups"][$index]["effects"][$effectIndex]["effect"] = Arr::get($this->effectTranslation, $spellEffect->effect);
                $this->spellInfo["dommage_groups"][$index]["effects"][$effectIndex]["cc"] = $spellEffect->cc;
                $this->spellInfo["dommage_groups"][$index]["effects"][$effectIndex]["min"] = $spellEffect->min;
                $this->spellInfo["dommage_groups"][$index]["effects"][$effectIndex]["max"] = $spellEffect->max;
                $this->spellInfo["dommage_groups"][$index]["effects"][$effectIndex]["duration"] = $spellEffect->duration;
            }
        }

        foreach ($spell->spellCharacteristics as $index => $characteristics) {
            dd($this->stuff);
            $this->spellInfo["characteristics"][$index+1]["PA"] = $characteristics->pa;
            $this->spellInfo["characteristics"][$index+1]["Portée"] = $characteristics->po;
            $this->spellInfo["characteristics"][$index+1]["% CC"] = $characteristics->cc;
            $this->spellInfo["characteristics"][$index+1]["% CC tot"] = $characteristics->cc+1;
            $this->spellInfo["characteristics"][$index+1]["Portée modifiable"] = $characteristics->pb;
            $this->spellInfo["characteristics"][$index+1]["lancer par tour"] = $characteristics->lt;
            $this->spellInfo["characteristics"][$index+1]["lancer par joueur"] = $characteristics->ltj;

        }


    }

    public function render(): View
    {
        return view('livewire.spell.unique-spell');
    }


}
