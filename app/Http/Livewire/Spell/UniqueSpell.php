<?php

namespace App\Http\Livewire\Spell;

use App\Models\CalculatedSpellEffects;
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
        "ga" => "agility",
        "gf" => "intel",
        "ge" => "luck",
        "gt" => "strength",
    ];
    public string $meleeOrDistance;


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
        foreach ($spell->dommageGroups as $index => $dommageGroup) {
            $this->spellInfo["dommage_groups"][$index]["order"] = $dommageGroup->order;
            $this->spellInfo["dommage_groups"][$index]["title"] = $dommageGroup->title === "" ? "Dégâts" : $dommageGroup->title;

            foreach ($dommageGroup->spellEffects as $effectIndex => $spellEffect) {
                $calculatedSpellEffect =
                    CalculatedSpellEffects::query()
                        ->where("stuff_id", "=", $this->stuff->id)
                        ->where("spell_effect_id", "=", $spellEffect->id)
                        ->first()
                        ->toArray();
                $this->spellInfo["dommage_groups"][$index]["effects"][$effectIndex] = $calculatedSpellEffect;
            }
        }

        foreach ($spell->spellCharacteristics as $index => $characteristics) {
            $this->spellInfo["characteristics"][$index + 1]["PA"] = $characteristics->pa;
            $this->spellInfo["characteristics"][$index + 1]["Portée"] = $characteristics->po;
            $this->spellInfo["characteristics"][$index + 1]["% CC"] = $characteristics->cc;
            $this->spellInfo["characteristics"][$index + 1]["% CC tot"] = !is_null($characteristics->cc) ? $characteristics->cc + $this->stuff->stuff_critic : null;
            $this->spellInfo["characteristics"][$index + 1]["Portée modifiable"] = $characteristics->pb;
            $this->spellInfo["characteristics"][$index + 1]["Lancer en ligne"] = $characteristics->lel;
            $this->spellInfo["characteristics"][$index + 1]["Pas de ligne de vue"] = $characteristics->ldv;
            $this->spellInfo["characteristics"][$index + 1]["lancer par tour"] = $characteristics->lt;
            $this->spellInfo["characteristics"][$index + 1]["lancer par cible"] = $characteristics->ltj;
            if (!is_null($characteristics->ir)) {
                $this->spellInfo["characteristics"][$index + 1][$characteristics->ir . ($characteristics->ir > 1 ? " tours" : " tour")] = "Intervalle de relance :";
            }
            if (!is_null($characteristics->cu)) {
                $this->spellInfo["characteristics"][$index + 1][": " . $characteristics->cu] = "Cumul";
            }
            if (!is_null($characteristics->zo)) {
                $this->spellInfo["characteristics"][$index + 1]["zone_img"] = $characteristics->zo_zo;
                if (!is_null($characteristics->zo_po)) {
                    $this->spellInfo["characteristics"][$index + 1][$characteristics->zo_po] = "oui";
                }
            }


        }
    }

    public function updateMeleeOrDistance(string $meleeOrDistance)
    {
        $this->emit('updateMeleeOrDistance',
            $meleeOrDistance
        );
    }

    public function render(): View
    {
        return view('livewire.spell.unique-spell');
    }


}
