<?php

namespace App\Http\Trait;

use App\Models\Items;
use App\Models\Stuffs;

trait StuffTrait
{
    public Stuffs $stuff;

    public array $stuffDetail = [
        'amulet' => null,
        'shield' => null,
        'ring_1' => null,
        'ring_2' => null,
        'belt' => null,
        'boots' => null,
        'hat' => null,
        'cape' => null,
        'dofus_1' => null,
        'dofus_2' => null,
        'dofus_3' => null,
        'dofus_4' => null,
        'dofus_5' => null,
        'dofus_6' => null,
        'animal' => null,
        'weapon' => null
    ];

    public array $setLinks = [
    ];

    public function getStuff(int $stuff_id)
    {
        return $this->stuff = Stuffs::query()->where('id', '=', $stuff_id)->get()->first();
    }


    public function goToSet(string $setName)
    {
        return redirect()->route('sets-encyclopedia', ['setName' => $setName]);
    }

    public function goToSpellsPage()
    {
        return redirect()->route('spells');
    }

    public function openItemsEncyclopediaWithFilters(string $equipementType, int $maxLvl)
    {
        return redirect()->route('items-encyclopedia', [
            'equipementType' => $equipementType,
            'maxLvl' => $maxLvl]);
    }

    public function updateLevel(int $level): void
    {
        $this->stuff->character_level = $level;
        $this->setTotalVitality();
        $this->setBoostAvailable();
        if ($level >= 100) {
            $this->stuff->total_pa = 6 + 1 + $this->stuff->is_exo_pa;
        }
        $this->saveStuff();
    }

    public function updateExoPa(int $is_exo_pa): void
    {
        $this->stuff->is_exo_pa = $is_exo_pa;
        $this->setPa();
        $this->saveStuff();
    }

    public function updateExoPm(int $is_exo_pm): void
    {
        $this->stuff->is_exo_pm = $is_exo_pm;
        $this->setPm();
        $this->saveStuff();
    }

    public function updateExoPo(int $is_exo_po): void
    {
        $this->stuff->is_exo_po = $is_exo_po;
        $this->setPo();
        $this->saveStuff();
    }

    public function setPa(): void
    {
        $extraPaByLvl = $this->stuff->character_level >= 100 ? 1 : 0;
        $this->stuff->total_pa = 6 + $extraPaByLvl + $this->stuff->is_exo_pa + $this->stuff->stuff_pa;
    }

    public function setPm(): void
    {
        $this->stuff->total_pm = 3 + $this->stuff->is_exo_pm + $this->stuff->stuff_pm;
    }

    public function setPo(): void
    {
        $this->stuff->total_po = $this->stuff->is_exo_po + $this->stuff->stuff_po;
    }

    public function updateTitle(string $title): void
    {
        $this->stuff->title = $title;
        $this->saveStuff();
    }

    public function updateClass(int $class_id): void
    {
        $this->stuff->class_id = $class_id;
        $this->saveStuff();
    }

    public function updateCharacterGender(string $character_gender): void
    {
        $this->stuff->gender = $character_gender;
        $this->saveStuff();
    }

    public function setInitiative(): void
    {
        $this->stuff->total_initiative = $this->stuff->subtotal_strength + $this->stuff->subtotal_intel + $this->stuff->subtotal_luck + $this->stuff->subtotal_agility + $this->stuff->stuff_initiative;
    }

    public function setTotalVitality(): void
    {
        $this->stuff->total_vitality = 50 + ($this->stuff->character_level * 5) + $this->stuff->subtotal_vitality;
    }

    public function setSubtotalVitality(): void
    {
        $this->stuff->subtotal_vitality = $this->stuff->vitality_parchment + $this->stuff->vitality_boost + $this->stuff->stuff_vitality;
        $this->setTotalVitality();
    }

    public function setSubtotalWisdom(): void
    {
        $this->stuff->subtotal_wisdom = $this->stuff->wisdom_parchment + $this->stuff->wisdom_boost + $this->stuff->stuff_wisdom;
        $this->setAvoidPa();
        $this->setAvoidPm();
        $this->setPaRecession();
        $this->setPmRecession();
    }

    public function setSubtotalStrength(): void
    {
        $this->stuff->subtotal_strength = $this->stuff->strength_parchment + $this->stuff->strength_boost + $this->stuff->stuff_strength;
        $this->setInitiative();
        $this->setPods();
    }

    public function setSubtotalIntel(): void
    {
        $this->stuff->subtotal_intel = $this->stuff->intel_parchment + $this->stuff->intel_boost + $this->stuff->stuff_intel;
        $this->setInitiative();
    }

    public function setSubtotalLuck(): void
    {
        $this->stuff->subtotal_luck = $this->stuff->luck_parchment + $this->stuff->luck_boost + $this->stuff->stuff_luck;
        $this->setInitiative();
        $this->setProspection();
    }

    public function setSubtotalAgility(): void
    {
        $this->stuff->subtotal_agility = $this->stuff->agility_parchment + $this->stuff->agility_boost + $this->stuff->stuff_agility;
        $this->setInitiative();
        $this->setLeak();
        $this->setTackle();
    }

    public function setAvoidPa(): void
    {
        $this->stuff->avoid_pa = round(floor($this->stuff->subtotal_wisdom / 10)) + $this->stuff->stuff_avoid_pa;
    }

    public function setAvoidPm(): void
    {
        $this->stuff->avoid_pm = round(floor($this->stuff->subtotal_wisdom / 10)) + $this->stuff->stuff_avoid_pm;
    }

    public function setPaRecession(): void
    {
        $this->stuff->pa_recession = round(floor($this->stuff->subtotal_wisdom / 10)) + $this->stuff->stuff_pa_recession;
    }

    public function setPmRecession(): void
    {
        $this->stuff->pm_recession = round(floor($this->stuff->subtotal_wisdom / 10)) + $this->stuff->stuff_pm_recession;
    }

    public function setPods(): void
    {
        $this->stuff->pods = 1000 + (5 * $this->stuff->subtotal_strength) + $this->stuff->stuff_pods;
    }

    public function setProspection(): void
    {
        $this->stuff->total_prospection = 100 + round(floor($this->stuff->subtotal_luck / 10)) + $this->stuff->stuff_prospection;
    }

    public function setLeak(): void
    {
        $this->stuff->leak = round(floor($this->stuff->subtotal_agility / 10)) + $this->stuff->stuff_leak;
    }

    public function setTackle(): void
    {
        $this->stuff->tackle = round(floor($this->stuff->subtotal_agility / 10)) + $this->stuff->stuff_tackle;
    }

    public function setBoostAvailable(): void
    {
        $base_boost_available = ($this->stuff->character_level * 5) - 5;
        $vitality_boost = $this->stuff->vitality_boost;
        $wisdom_boost = $this->stuff->wisdom_boost * 3;
        $strength_boost = $this->getBoostCharacteristicPoints($this->stuff->strength_boost);
        $intel_boost = $this->getBoostCharacteristicPoints($this->stuff->intel_boost);
        $luck_boost = $this->getBoostCharacteristicPoints($this->stuff->luck_boost);
        $agility_boost = $this->getBoostCharacteristicPoints($this->stuff->agility_boost);

        $this->stuff->boost_available = $base_boost_available - $vitality_boost - $wisdom_boost - $strength_boost - $intel_boost - $luck_boost - $agility_boost;
    }

    public function updateParchmentVitality(int $vitality_parchment): void
    {
        $this->stuff->vitality_parchment = $vitality_parchment;
        $this->setSubtotalVitality();
        $this->saveStuff();

    }

    public function updateParchmentWisdom(int $wisdom_parchment): void
    {
        $this->stuff->wisdom_parchment = $wisdom_parchment;
        $this->setSubtotalWisdom();
        $this->saveStuff();
    }

    public function updateParchmentStrength(int $strength_parchment): void
    {
        $this->stuff->strength_parchment = $strength_parchment;
        $this->setSubtotalStrength();
        $this->saveStuff();
    }

    public function updateParchmentIntel(int $intel_parchment): void
    {
        $this->stuff->intel_parchment = $intel_parchment;
        $this->setSubtotalIntel();
        $this->saveStuff();
    }

    public function updateParchmentLuck(int $luck_parchment): void
    {
        $this->stuff->luck_parchment = $luck_parchment;
        $this->setSubtotalLuck();
        $this->saveStuff();
    }

    public function updateParchmentAgility(int $agility_parchment): void
    {
        $this->stuff->agility_parchment = $agility_parchment;
        $this->setSubtotalAgility();
        $this->saveStuff();
    }

    public function updateBoostVitality(int $vitality_boost): void
    {
        $this->stuff->vitality_boost = $vitality_boost;
        $this->setSubtotalVitality();
        $this->setBoostAvailable();
        $this->saveStuff();
    }

    public function updateBoostWisdom(int $wisdom_boost): void
    {
        $this->stuff->wisdom_boost = $wisdom_boost;
        $this->setSubtotalWisdom();
        $this->setBoostAvailable();
        $this->saveStuff();
    }

    public function updateBoostStrength(int $strength_boost): void
    {
        $this->stuff->strength_boost = $strength_boost;
        $this->setSubtotalStrength();
        $this->setBoostAvailable();
        $this->saveStuff();
    }

    public function updateBoostIntel(int $intel_boost): void
    {
        $this->stuff->intel_boost = $intel_boost;
        $this->setSubtotalIntel();
        $this->setBoostAvailable();
        $this->saveStuff();
    }

    public function updateBoostLuck(int $luck_boost): void
    {
        $this->stuff->luck_boost = $luck_boost;
        $this->setSubtotalLuck();
        $this->setBoostAvailable();
        $this->saveStuff();
    }

    public function updateBoostAgility(int $agility_boost): void
    {
        $this->stuff->agility_boost = $agility_boost;
        $this->setSubtotalAgility();
        $this->setBoostAvailable();
        $this->saveStuff();
    }

    public function updateIsPrivateStuff(bool $is_private_stuff): void
    {
        $this->stuff->is_private = $is_private_stuff;
        $this->saveStuff();
    }

    private function getBoostCharacteristicPoints(int $characteristic): int
    {
        $charac_boost = 0;
        for ($i = 1; $i <= $characteristic; $i++) {
            if ($i <= 100) $charac_boost += 1;
            if (100 < $i && $i <= 200) $charac_boost += 2;
            if (200 < $i && $i <= 300) $charac_boost += 3;
            if (300 < $i && $i <= 400) $charac_boost += 4;
        }
        return $charac_boost;
    }

    public function updateParchmentsToZero(): void
    {
        $this->updateParchmentVitality(0);
        $this->updateParchmentWisdom(0);
        $this->updateParchmentStrength(0);
        $this->updateParchmentIntel(0);
        $this->updateParchmentLuck(0);
        $this->updateParchmentAgility(0);
    }

    public function updateParchmentsToHundred(): void
    {
        $this->updateParchmentVitality(100);
        $this->updateParchmentWisdom(100);
        $this->updateParchmentStrength(100);
        $this->updateParchmentIntel(100);
        $this->updateParchmentLuck(100);
        $this->updateParchmentAgility(100);
    }

    public function saveStuff(): void
    {
        $this->stuff->save();
        session()->put('stuff', $this->stuff);
    }


    public function updateStuffCharacteristic(string $stuffCharacteristicName, int $stuffCharacteristicsValue): void
    {
        $this->stuff->{"stuff_" . $stuffCharacteristicName} += $stuffCharacteristicsValue;

        $updatedCharacteristicName = "";
        foreach (explode("_", $stuffCharacteristicName) as $partOfStuffCharacteristicName) {
            $updatedCharacteristicName .= ucfirst($partOfStuffCharacteristicName);
        }

        $basicsCharacteristics = ["vitality", "wisdom", "strength", "intel", "luck", "agility"];
        $ignoredCharacteristics = [
            "power",
            "critic",
            "health",
            "invocation",
            "neutral_res",
            "water_res",
            "earth_res",
            "fire_res",
            "air_res",
            "percent_neutral_res",
            "percent_water_res",
            "percent_earth_res",
            "percent_fire_res",
            "percent_air_res",
            "distance_res",
            "critique_res",
            "push_res",
            "melee_res",
            "weapon_res",
            "do_neutral",
            "do_earth",
            "do_fire",
            "do_air",
            "do_water",
            "do_critique",
            "do_push",
            "do_melee",
            "do_distance",
            "do_weapon",
            "do_spell"
        ];
        if (in_array($stuffCharacteristicName, $basicsCharacteristics)) {
            $this->{"setSubtotal" . $updatedCharacteristicName}();
        } else {
            if (in_array($stuffCharacteristicName, $ignoredCharacteristics) === false) {
                $this->{"set" . $updatedCharacteristicName}();
            }
        }
    }

    public function deleteItemToStuff(string $columnToDelete): void
    {
        $this->stuffDetail[$columnToDelete] = null;
        $this->stuff->{$columnToDelete . '_id'} = null;
        $this->saveStuff();
        $this->resetItemsCharacteristics();
    }

    private function resetItemsCharacteristics(): void
    {
        $this->setStuffCharacteristicsToZero();
        foreach ($this->stuffDetail as $item) {
            if (is_null($item) === false) {
                foreach ($item->effects as $effect) {

                    $value = $effect->int_maximum;
                    if ($effect->ignore_int_max) {
                        $value = $effect->int_minimum;
                    }
                    if (is_null($effect->translated_name) === false) {
                        $this->updateStuffCharacteristic($effect->translated_name, $value);
                    }
                }
                if ($this->stuff->stuff_level < $item->level) {
                    $this->stuff->stuff_level = $item->level;
                }
            }
        }
        foreach ($this->setLinks as $setLink) {
            foreach ($setLink[0]->set->effects as $effect) {
                if ($effect->set_number_items == count($setLink)) {
                    $value = $effect->int_maximum;
                    if ($effect->ignore_int_max) {
                        $value = $effect->int_minimum;
                    }
                    if (is_null($effect->translated_name) === false) {
                        $this->updateStuffCharacteristic($effect->translated_name, $value);
                    }
                }
            }
        }
        $this->saveStuff();
    }

    private function setStuffCharacteristicsToZero(): void
    {
        $this->stuff->total_vitality = 0;
        $this->stuff->total_prospection = 0;
        $this->stuff->total_pa = 0;
        $this->stuff->total_pm = 0;
        $this->stuff->total_po = 0;
        $this->stuff->total_initiative = 0;
        $this->stuff->subtotal_vitality = 0;
        $this->stuff->subtotal_intel = 0;
        $this->stuff->subtotal_agility = 0;
        $this->stuff->subtotal_strength = 0;
        $this->stuff->subtotal_luck = 0;
        $this->stuff->subtotal_wisdom = 0;
        $this->stuff->leak = 0;
        $this->stuff->avoid_pa = 0;
        $this->stuff->avoid_pm = 0;
        $this->stuff->pods = 0;
        $this->stuff->tackle = 0;
        $this->stuff->pa_recession = 0;
        $this->stuff->pm_recession = 0;
        $this->stuff->stuff_level = 0;
        $this->stuff->stuff_vitality = 0;
        $this->stuff->stuff_strength = 0;
        $this->stuff->stuff_intel = 0;
        $this->stuff->stuff_luck = 0;
        $this->stuff->stuff_agility = 0;
        $this->stuff->stuff_wisdom = 0;
        $this->stuff->stuff_initiative = 0;
        $this->stuff->stuff_leak = 0;
        $this->stuff->stuff_avoid_pm = 0;
        $this->stuff->stuff_avoid_pa = 0;
        $this->stuff->stuff_pa_recession = 0;
        $this->stuff->stuff_pm_recession = 0;
        $this->stuff->stuff_pods = 0;
        $this->stuff->stuff_prospection = 0;
        $this->stuff->stuff_tackle = 0;
        $this->stuff->stuff_invocation = 1;
        $this->stuff->stuff_health = 0;
        $this->stuff->stuff_power = 0;
        $this->stuff->stuff_critic = 0;
        $this->stuff->stuff_pa = 0;
        $this->stuff->stuff_pm = 0;
        $this->stuff->stuff_po = 0;
        $this->stuff->stuff_neutral_res = 0;
        $this->stuff->stuff_water_res = 0;
        $this->stuff->stuff_earth_res = 0;
        $this->stuff->stuff_fire_res = 0;
        $this->stuff->stuff_air_res = 0;
        $this->stuff->stuff_percent_neutral_res = 0;
        $this->stuff->stuff_percent_water_res = 0;
        $this->stuff->stuff_percent_earth_res = 0;
        $this->stuff->stuff_percent_fire_res = 0;
        $this->stuff->stuff_percent_air_res = 0;
        $this->stuff->stuff_distance_res = 0;
        $this->stuff->stuff_critique_res = 0;
        $this->stuff->stuff_push_res = 0;
        $this->stuff->stuff_melee_res = 0;
        $this->stuff->stuff_weapon_res = 0;
        $this->stuff->stuff_do_neutral = 0;
        $this->stuff->stuff_do_earth = 0;
        $this->stuff->stuff_do_fire = 0;
        $this->stuff->stuff_do_air = 0;
        $this->stuff->stuff_do_water = 0;
        $this->stuff->stuff_do_critique = 0;
        $this->stuff->stuff_do_push = 0;
        $this->stuff->stuff_do_melee = 0;
        $this->stuff->stuff_do_distance = 0;
        $this->stuff->stuff_do_weapon = 0;
        $this->stuff->stuff_do_spell = 0;
    }

}