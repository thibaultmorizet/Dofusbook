<?php

namespace App\Http\Trait;

use App\Models\CalculatedSpellEffects;
use App\Models\Spells;
use Illuminate\Support\Arr;

trait SpellTrait
{
    public array $effectTranslation = [
        "df" => "intel",
        "dn" => "neutral",
        "dt" => "strength",
        "da" => "agility",
        "pou" => "do_push",
        "de" => "luck",
        "ga" => "agility",
        "gf" => "intel",
        "ge" => "luck",
        "gt" => "strength",
        "vt" => "strength",
        "vf" => "intel",
        "ve" => "luck",
        "va" => "agility",
        "vn" => "neutral",
        "pdva" => "vitality",
        "pia" => "agility",
        "pct" => "vitality",
        "pif" => "intel",
        "pie" => "luck",
        "pit" => "strength",
        "pve" => "luck",
        "dse" => "luck",
        "pdv" => "vitality",
        "dsa" => "agility",
        "pcta" => "vitality",
        "dv" => "vitality",
    ];

    public function loadEffectsBySpell($stuff): void
    {
        CalculatedSpellEffects::query()
            ->where("stuff_id", "=", $stuff->id)
            ->delete();

        $spells = Spells::query()
            ->where("class_id", "=", $stuff->class_id)
            ->orWhereNull("class_id")
            ->orderBy("spell_group")
            ->get();

        foreach ($spells as $spell) {
            foreach ($spell->dommageGroups as $index => $dommageGroup) {
                foreach ($dommageGroup->spellEffects as $effectIndex => $spellEffect) {
                    $calculatedSpellEffect =
                        CalculatedSpellEffects::query()
                            ->where("stuff_id", "=", $stuff->id)
                            ->where("spell_effect_id", "=", $spellEffect->id)
                            ->first();

                    if (is_null($calculatedSpellEffect)) {
                        $calculatedSpellEffect = new CalculatedSpellEffects();
                    }

                    $effect = Arr::get($this->effectTranslation, $spellEffect->effect);
                    if (is_null($effect))
                        dd($spellEffect);
                    $cc = $spellEffect->cc;
                    $doCrit = 0;
                    if ($cc === 1) {
                        $doCrit = $this->stuff->stuff_do_critique;
                    }
                    $min = $spellEffect->min;
                    $max = $spellEffect->max;
                    $subResMin = $min +
                        ($min * (($this->stuff->{"subtotal_" . $effect} + $this->stuff->stuff_power) / 100)) + $doCrit +
                        $this->stuff->{"stuff_do_" . $effect};
                    $subResMax = $max +
                        ($max * (($this->stuff->{"subtotal_" . $effect} + $this->stuff->stuff_power) / 100)) + $doCrit +
                        $this->stuff->{"stuff_do_" . $effect};

                    $meleeMin = floor(
                        $subResMin + ((($this->stuff->stuff_do_melee) * $subResMin) / 100)
                    );
                    $meleeMax = floor(
                        $subResMax + (($this->stuff->stuff_do_melee * $subResMax) / 100)
                    );
                    $distanceMin = floor(
                        $subResMin + ((($this->stuff->stuff_do_distance) * $subResMin) / 100)
                    );
                    $distanceMax = floor(
                        $subResMax + (($this->stuff->stuff_do_distance * $subResMax) / 100)
                    );

                    $calculatedSpellEffect->level = $spellEffect->level;
                    $calculatedSpellEffect->effect = $effect;
                    $calculatedSpellEffect->cc = $cc;
                    $calculatedSpellEffect->min = $min;
                    $calculatedSpellEffect->max = $max;
                    $calculatedSpellEffect->min_melee = $meleeMin;
                    $calculatedSpellEffect->max_melee = $meleeMax;
                    $calculatedSpellEffect->min_distance = $distanceMin;
                    $calculatedSpellEffect->max_distance = $distanceMax;
                    $calculatedSpellEffect->duration = $spellEffect->duration;
                    $calculatedSpellEffect->stuff_id = $stuff->id;
                    $calculatedSpellEffect->spell_effect_id = $spellEffect->id;
                    $calculatedSpellEffect->save();
                }
            }
        }
    }

}