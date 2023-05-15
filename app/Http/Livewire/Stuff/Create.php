<?php

namespace App\Http\Livewire\Stuff;

use App\Models\Items;
use App\Models\Stuffs;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    protected CreateVariable $createVariable;

    public int $boost_vitality = 0;
    public int $boost_wisdom = 0;
    public int $boost_strength = 0;
    public int $boost_intel = 0;
    public int $boost_luck = 0;
    public int $boost_agility = 0;
    public int $boost_available = 0;

    public int $parchment_vitality = 0;
    public int $parchment_wisdom = 0;
    public int $parchment_strength = 0;
    public int $parchment_intel = 0;
    public int $parchment_luck = 0;
    public int $parchment_agility = 0;
    public string $stuff_title = "";
    public int $character_level = 1;
    public Stuffs $stuff;

    public function mount(Stuffs $stuff)
    {
        $this->stuff = $stuff;
        $this->reloadData($this->stuff);
    }

    public function reloadData(Stuffs $stuff)
    {
        $this->createVariable = new CreateVariable();
        $this->createVariable->stuff_id = $stuff->id;
        $this->createVariable->class_slug = $stuff->class->slug;

        $this->updateIsPrivateStuff($stuff->is_private);
        $this->updateClass($stuff->class->id);
        $this->updateTitle($stuff->title);
        $this->updateCharacterGender($stuff->gender);
        $this->updateLevel($stuff->character_level);
        $this->updateExoPa($stuff->is_exo_pa);
        $this->updateExoPm($stuff->is_exo_pm);
        $this->updateExoPo($stuff->is_exo_po);

        $this->updateBoostVitality($stuff->vitality_boost);
        $this->updateBoostWisdom($stuff->wisdom_boost);
        $this->updateBoostStrength($stuff->strength_boost);
        $this->updateBoostIntel($stuff->intel_boost);
        $this->updateBoostLuck($stuff->luck_boost);
        $this->updateBoostAgility($stuff->agility_boost);

        $this->updateParchmentVitality($stuff->vitality_parchment);
        $this->updateParchmentWisdom($stuff->wisdom_parchment);
        $this->updateParchmentStrength($stuff->strength_parchment);
        $this->updateParchmentIntel($stuff->intel_parchment);
        $this->updateParchmentLuck($stuff->luck_parchment);
        $this->updateParchmentAgility($stuff->agility_parchment);

    }

    public function updateLevel(int $level)
    {
        $this->character_level = $level;
        $this->setTotalVitality();
        $this->setBoostAvailable();
        if ($level >= 100) {
            $this->createVariable->total_pa = 6 + 1 + $this->createVariable->is_exo_pa;
        }
        $this->stuff->character_level = $this->character_level;
        $this->stuff->save();
    }

    public function updateExoPa(int $is_exo_pa)
    {
        $this->createVariable->is_exo_pa = $is_exo_pa;
        $this->stuff->is_exo_pa = $this->createVariable->is_exo_pa;
        $this->stuff->save();
        $this->setPa();
    }

    public function updateExoPm(int $is_exo_pm)
    {
        $this->createVariable->is_exo_pm = $is_exo_pm;
        $this->stuff->is_exo_pm = $this->createVariable->is_exo_pm;
        $this->stuff->save();
        $this->setPm();
    }

    public function updateExoPo(int $is_exo_po)
    {
        $this->createVariable->is_exo_po = $is_exo_po;
        $this->stuff->is_exo_po = $this->createVariable->is_exo_po;
        $this->stuff->save();
        $this->setPo();
    }

    public function setPa()
    {
        $extraPaByLvl = $this->character_level >= 100 ? 1 : 0;
        $this->createVariable->total_pa = 6 + $extraPaByLvl + $this->createVariable->is_exo_pa + $this->createVariable->stuff_pa;
    }

    public function setPm()
    {
        $this->createVariable->total_pm = 3 + $this->createVariable->is_exo_pm + $this->createVariable->stuff_pm;
    }

    public function setPo()
    {
        $this->createVariable->total_po = $this->createVariable->is_exo_po + $this->createVariable->stuff_po;
    }

    public function updateTitle(string $title)
    {
        $this->stuff_title = $title;

        $this->stuff->title = $this->stuff_title;
        $this->stuff->save();

    }

    public function updateClass(int $class_id)
    {
        $this->createVariable->class_id = $class_id;

        $this->stuff->class_id = $this->createVariable->class_id;
        $this->stuff->save();

    }

    public function updateCharacterGender(string $character_gender)
    {
        $this->createVariable->character_gender = $character_gender;

        $this->stuff->gender = $this->createVariable->character_gender;
        $this->stuff->save();

    }

    public function setInitiative()
    {
        $this->createVariable->total_initiative = $this->createVariable->subtotal_strength + $this->createVariable->subtotal_intel + $this->createVariable->subtotal_luck + $this->createVariable->subtotal_agility + $this->createVariable->stuff_initiative;
    }

    public function setTotalVitality()
    {
        $this->createVariable->total_vitality = 50 + ($this->character_level * 5) + $this->createVariable->subtotal_vitality;
    }

    public function setSubtotalVitality()
    {
        $this->createVariable->subtotal_vitality = $this->parchment_vitality + $this->boost_vitality + $this->createVariable->stuff_vitality;
        $this->setTotalVitality();
    }

    public function setSubtotalWisdom()
    {
        $this->createVariable->subtotal_wisdom = $this->parchment_wisdom + $this->boost_wisdom + $this->createVariable->stuff_wisdom;
        $this->setAvoidPa();
        $this->setAvoidPm();
        $this->setPaRecession();
        $this->setPmRecession();
    }

    public function setSubtotalStrength()
    {
        $this->createVariable->subtotal_strength = $this->parchment_strength + $this->boost_strength + $this->createVariable->stuff_strength;
        $this->setInitiative();
        $this->setPods();
    }

    public function setSubtotalIntel()
    {
        $this->createVariable->subtotal_intel = $this->parchment_intel + $this->boost_intel + $this->createVariable->stuff_intel;
        $this->setInitiative();
    }

    public function setSubtotalLuck()
    {
        $this->createVariable->subtotal_luck = $this->parchment_luck + $this->boost_luck + $this->createVariable->stuff_luck;
        $this->setInitiative();
        $this->setProspection();
    }

    public function setSubtotalAgility()
    {
        $this->createVariable->subtotal_agility = $this->parchment_agility + $this->boost_agility + $this->createVariable->stuff_agility;
        $this->setInitiative();
        $this->setLeak();
        $this->setTackle();
    }

    public function setAvoidPa()
    {
        $this->createVariable->avoid_pa = round(floor($this->createVariable->subtotal_wisdom / 10)) + $this->createVariable->stuff_avoid_pa;
    }

    public function setAvoidPm()
    {
        $this->createVariable->avoid_pm = round(floor($this->createVariable->subtotal_wisdom / 10)) + $this->createVariable->stuff_avoid_pm;
    }

    public function setPaRecession()
    {
        $this->createVariable->pa_recession = round(floor($this->createVariable->subtotal_wisdom / 10)) + $this->createVariable->stuff_pa_recession;
    }

    public function setPmRecession()
    {
        $this->createVariable->pm_recession = round(floor($this->createVariable->subtotal_wisdom / 10)) + $this->createVariable->stuff_pm_recession;
    }

    public function setPods()
    {
        $this->createVariable->pods = 1000 + (5 * $this->createVariable->subtotal_strength) + $this->createVariable->stuff_pods;
    }

    public function setProspection()
    {
        $this->createVariable->total_prospection = 100 + round(floor($this->createVariable->subtotal_luck / 10)) + $this->createVariable->stuff_prospection;
    }

    public function setLeak()
    {
        $this->createVariable->leak = round(floor($this->createVariable->subtotal_agility / 10)) + $this->createVariable->stuff_leak;
    }

    public function setTackle()
    {
        $this->createVariable->tackle = round(floor($this->createVariable->subtotal_agility / 10)) + $this->createVariable->stuff_tackle;
    }

    public function setBoostAvailable()
    {
        $base_boost_available = ($this->character_level * 5) - 5;
        $boost_vitality = $this->boost_vitality;
        $boost_wisdom = $this->boost_wisdom * 3;
        $boost_strength = $this->getBoostCharacteristicPoints($this->boost_strength);
        $boost_intel = $this->getBoostCharacteristicPoints($this->boost_intel);
        $boost_luck = $this->getBoostCharacteristicPoints($this->boost_luck);
        $boost_agility = $this->getBoostCharacteristicPoints($this->boost_agility);

        $this->boost_available = $base_boost_available - $boost_vitality - $boost_wisdom - $boost_strength - $boost_intel - $boost_luck - $boost_agility;
    }

    public function updateParchmentVitality(int $parchment_vitality)
    {
        $this->parchment_vitality = $parchment_vitality;
        $this->setSubtotalVitality();
        $this->stuff->vitality_parchment = $this->parchment_vitality;
        $this->stuff->save();

    }

    public function updateParchmentWisdom(int $parchment_wisdom)
    {
        $this->parchment_wisdom = $parchment_wisdom;
        $this->setSubtotalWisdom();
        $this->stuff->wisdom_parchment = $this->parchment_wisdom;
        $this->stuff->save();
    }

    public function updateParchmentStrength(int $parchment_strength)
    {
        $this->parchment_strength = $parchment_strength;
        $this->setSubtotalStrength();
        $this->stuff->strength_parchment = $this->parchment_strength;
        $this->stuff->save();
    }

    public function updateParchmentIntel(int $parchment_intel)
    {
        $this->parchment_intel = $parchment_intel;
        $this->setSubtotalIntel();
        $this->stuff->intel_parchment = $this->parchment_intel;
        $this->stuff->save();
    }

    public function updateParchmentLuck(int $parchment_luck)
    {
        $this->parchment_luck = $parchment_luck;
        $this->setSubtotalLuck();
        $this->stuff->luck_parchment = $this->parchment_luck;
        $this->stuff->save();
    }

    public function updateParchmentAgility(int $parchment_agility)
    {
        $this->parchment_agility = $parchment_agility;
        $this->setSubtotalAgility();
        $this->stuff->agility_parchment = $this->parchment_agility;
        $this->stuff->save();
    }

    public function updateBoostVitality(int $boost_vitality)
    {
        $this->boost_vitality = $boost_vitality;
        $this->setSubtotalVitality();
        $this->setBoostAvailable();
        $this->stuff->vitality_boost = $this->boost_vitality;
        $this->stuff->save();
    }

    public function updateBoostWisdom(int $boost_wisdom)
    {
        $this->boost_wisdom = $boost_wisdom;
        $this->setSubtotalWisdom();
        $this->setBoostAvailable();
        $this->stuff->wisdom_boost = $this->boost_wisdom;
        $this->stuff->save();
    }

    public function updateBoostStrength(int $boost_strength)
    {
        $this->boost_strength = $boost_strength;
        $this->setSubtotalStrength();
        $this->setBoostAvailable();
        $this->stuff->strength_boost = $this->boost_strength;
        $this->stuff->save();
    }

    public function updateBoostIntel(int $boost_intel)
    {
        $this->boost_intel = $boost_intel;
        $this->setSubtotalIntel();
        $this->setBoostAvailable();
        $this->stuff->intel_boost = $this->boost_intel;
        $this->stuff->save();
    }

    public function updateBoostLuck(int $boost_luck)
    {
        $this->boost_luck = $boost_luck;
        $this->setSubtotalLuck();
        $this->setBoostAvailable();
        $this->stuff->luck_boost = $this->boost_luck;
        $this->stuff->save();
    }

    public function updateBoostAgility(int $boost_agility)
    {
        $this->boost_agility = $boost_agility;
        $this->setSubtotalAgility();
        $this->setBoostAvailable();
        $this->stuff->agility_boost = $this->boost_agility;
        $this->stuff->save();
    }

    public function updateIsPrivateStuff(bool $is_private_stuff)
    {
        $this->createVariable->is_private_stuff = $is_private_stuff;
        $this->stuff->is_private = $this->createVariable->is_private_stuff;
        $this->stuff->save();
    }

    private function getBoostCharacteristicPoints(int $characteristic): int
    {
        $boost_strength = 0;
        for ($i = 1; $i <= $characteristic; $i++) {
            if ($i <= 100) $boost_strength += 1;
            if (100 < $i && $i <= 200) $boost_strength += 2;
            if (200 < $i && $i <= 300) $boost_strength += 3;
            if (300 < $i && $i <= 400) $boost_strength += 4;
        }
        return $boost_strength;
    }

    public function updateStuffCharacteristic(string $stuffCharacteristicName, int $stuffCharacteristicsValue)
    {
        $this->createVariable->{"stuff_" . $stuffCharacteristicName} += $stuffCharacteristicsValue;

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

    private function resetItemsCharacteristics()
    {

        $this->setStuffCharacteristicsToZero();
        foreach ($this->createVariable->stuffDetail as $item) {
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
                if ($this->createVariable->stuff_level < $item->level) {
                    $this->createVariable->stuff_level = $item->level;
                }
            }
        }
        foreach ($this->createVariable->setLinks as $setLink) {
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
    }

    private function setStuffCharacteristicsToZero()
    {
        $this->createVariable->stuff_vitality = 0;
        $this->createVariable->stuff_strength = 0;
        $this->createVariable->stuff_intel = 0;
        $this->createVariable->stuff_luck = 0;
        $this->createVariable->stuff_agility = 0;
        $this->createVariable->stuff_wisdom = 0;
        $this->createVariable->stuff_initiative = 0;
        $this->createVariable->stuff_leak = 0;
        $this->createVariable->stuff_avoid_pm = 0;
        $this->createVariable->stuff_avoid_pa = 0;
        $this->createVariable->stuff_pa_recession = 0;
        $this->createVariable->stuff_pm_recession = 0;
        $this->createVariable->stuff_pods = 0;
        $this->createVariable->stuff_prospection = 0;
        $this->createVariable->stuff_tackle = 0;
        $this->createVariable->stuff_invocation = 1;
        $this->createVariable->stuff_health = 0;
        $this->createVariable->stuff_power = 0;
        $this->createVariable->stuff_critic = 0;
        $this->createVariable->stuff_pa = 0;
        $this->createVariable->stuff_pm = 0;
        $this->createVariable->stuff_po = 0;
        $this->createVariable->stuff_neutral_res = 0;
        $this->createVariable->stuff_water_res = 0;
        $this->createVariable->stuff_earth_res = 0;
        $this->createVariable->stuff_fire_res = 0;
        $this->createVariable->stuff_air_res = 0;
        $this->createVariable->stuff_percent_neutral_res = 0;
        $this->createVariable->stuff_percent_water_res = 0;
        $this->createVariable->stuff_percent_earth_res = 0;
        $this->createVariable->stuff_percent_fire_res = 0;
        $this->createVariable->stuff_percent_air_res = 0;
        $this->createVariable->stuff_distance_res = 0;
        $this->createVariable->stuff_critique_res = 0;
        $this->createVariable->stuff_push_res = 0;
        $this->createVariable->stuff_melee_res = 0;
        $this->createVariable->stuff_weapon_res = 0;
        $this->createVariable->stuff_do_neutral = 0;
        $this->createVariable->stuff_do_earth = 0;
        $this->createVariable->stuff_do_fire = 0;
        $this->createVariable->stuff_do_air = 0;
        $this->createVariable->stuff_do_water = 0;
        $this->createVariable->stuff_do_critique = 0;
        $this->createVariable->stuff_do_push = 0;
        $this->createVariable->stuff_do_melee = 0;
        $this->createVariable->stuff_do_distance = 0;
        $this->createVariable->stuff_do_weapon = 0;
        $this->createVariable->stuff_do_spell = 0;

    }

    public function getStuffDetail()
    {
        foreach (array_keys($this->createVariable->stuffDetail) as $aStuffItem) {
            $item_id = $this->stuff->{$aStuffItem . '_id'};
            if (!is_null($item_id)) {
                $this->createVariable->stuffDetail[$aStuffItem] = Items::query()->with(['effects'])->where("id", $item_id)->get()->first();
            } else {
                $this->createVariable->stuffDetail[$aStuffItem] = null;
            }
        }
    }

    private function getSetLinks()
    {
        $this->createVariable->setLinks = [];
        foreach ($this->createVariable->stuffDetail as $item) {

            if (!is_null($item?->set)) {
                $this->createVariable->setLinks[$item?->set->id][] = $item;
            }
        }
        foreach ($this->createVariable->setLinks as $index => $setLink) {
            if (count($setLink) <= 1) {
                unset($this->createVariable->setLinks[$index]);
            }
        }
    }

    public function updateParchmentsToZero()
    {
        $this->updateParchmentVitality(0);
        $this->updateParchmentWisdom(0);
        $this->updateParchmentStrength(0);
        $this->updateParchmentIntel(0);
        $this->updateParchmentLuck(0);
        $this->updateParchmentAgility(0);
    }

    public function updateParchmentsToHundred()
    {
        $this->updateParchmentVitality(100);
        $this->updateParchmentWisdom(100);
        $this->updateParchmentStrength(100);
        $this->updateParchmentIntel(100);
        $this->updateParchmentLuck(100);
        $this->updateParchmentAgility(100);
    }

    public function goToSet(string $setName)
    {
        return redirect()->route('sets-encyclopedia', ['setName' => $setName]);
    }

    public function deleteItemToStuff(string $columnToDelete)
    {
        $this->reloadData($this->stuff);
        $this->createVariable->stuffDetail[$columnToDelete] = null;
        $this->stuff->{$columnToDelete . '_id'} = null;
        $this->stuff->save();
        $this->getStuffDetail();
        $this->resetItemsCharacteristics();
        session()->put('stuff', $this->stuff);
    }

    public function openItemsEncyclopediaWithFilters(string $equipementType, int $maxLvl)
    {
        return redirect()->route('items-encyclopedia', [
            'equipementType' => $equipementType,
            'maxLvl' => $maxLvl]);
    }

    public function render(): View
    {
        $this->reloadData($this->stuff);
        $this->getStuffDetail();
        $this->getSetLinks();
        $this->resetItemsCharacteristics();
        session()->put('stuff', $this->stuff);

        return view('livewire.stuff.create', ["createVariable" => $this->createVariable]);
    }
}
