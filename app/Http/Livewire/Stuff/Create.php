<?php

namespace App\Http\Livewire\Stuff;

use App\Models\Classes;
use App\Models\Items;
use App\Models\Stuffs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public ?int $stuff_id = null;

    public string $stuff_title = "";
    public int $character_level = 1;
    public string $character_gender = "male";
    public bool $is_private_stuff = true;

    public int $is_exo_pa = 0;
    public int $is_exo_pm = 0;
    public int $is_exo_po = 0;


    public int $total_vitality = 55;
    public int $total_prospection = 100;
    public int $total_pa = 6;
    public int $total_pm = 3;
    public int $total_po = 0;
    public int $total_initiative = 0;

    public int $subtotal_vitality = 0;
    public int $subtotal_wisdom = 0;
    public int $subtotal_strength = 0;
    public int $subtotal_intel = 0;
    public int $subtotal_luck = 0;
    public int $subtotal_agility = 0;

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

    public int $leak = 0;
    public int $avoid_pa = 0;
    public int $avoid_pm = 0;
    public int $pods = 1000;

    public int $tackle = 0;
    public int $pa_recession = 0;
    public int $pm_recession = 0;
    public int $stuff_level = 0;

    public Stuffs $stuff;
    public string $class_slug = "feca";
    public int $class_id = 1;


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

    public int $stuff_vitality = 0;
    public int $stuff_strength = 0;
    public int $stuff_intel = 0;
    public int $stuff_luck = 0;
    public int $stuff_agility = 0;
    public int $stuff_wisdom = 0;
    public int $stuff_initiative = 0;
    public int $stuff_leak = 0;
    public int $stuff_avoid_pm = 0;
    public int $stuff_avoid_pa = 0;
    public int $stuff_pa_recession = 0;
    public int $stuff_pm_recession = 0;
    public int $stuff_pods = 0;
    public int $stuff_prospection = 0;
    public int $stuff_tackle = 0;
    public int $stuff_invocation = 1;
    public int $stuff_health = 0;
    public int $stuff_power = 0;
    public int $stuff_critic = 0;
    public int $stuff_pa = 0;
    public int $stuff_pm = 0;
    public int $stuff_po = 0;
    public int $stuff_neutral_res = 0;
    public int $stuff_water_res = 0;
    public int $stuff_earth_res = 0;
    public int $stuff_fire_res = 0;
    public int $stuff_air_res = 0;
    public int $stuff_percent_neutral_res = 0;
    public int $stuff_percent_water_res = 0;
    public int $stuff_percent_earth_res = 0;
    public int $stuff_percent_fire_res = 0;
    public int $stuff_percent_air_res = 0;
    public int $stuff_distance_res = 0;
    public int $stuff_critique_res = 0;
    public int $stuff_push_res = 0;
    public int $stuff_melee_res = 0;
    public int $stuff_weapon_res = 0;
    public int $stuff_do_neutral = 0;
    public int $stuff_do_earth = 0;
    public int $stuff_do_fire = 0;
    public int $stuff_do_air = 0;
    public int $stuff_do_water = 0;
    public int $stuff_do_critique = 0;
    public int $stuff_do_push = 0;
    public int $stuff_do_melee = 0;
    public int $stuff_do_distance = 0;
    public int $stuff_do_weapon = 0;
    public int $stuff_do_spell = 0;

    public function mount(int $stuff_id = null, int $class_id = 1, bool $is_private_stuff = true, string $stuff_title = "", string $character_gender = "male", int $character_level = 1, int $is_exo_pa = 0, int $is_exo_pm = 0, int $is_exo_po = 0, int $boost_vitality = 0, int $boost_wisdom = 0, int $boost_strength = 0, int $boost_intel = 0, int $boost_luck = 0, int $boost_agility = 0, int $parchment_vitality = 0, int $parchment_wisdom = 0, int $parchment_strength = 0, int $parchment_intel = 0, int $parchment_luck = 0, int $parchment_agility = 0)
    {
        $this->stuff_id = $stuff_id;
        if (!is_null($this->stuff_id)) {
            $this->stuff = Stuffs::query()->find($this->stuff_id)->first();
            $this->class_slug = Classes::query()->findOrFail($class_id)->slug;
            $this->getStuffDetail();
            $this->resetItemsCharacteristics();
        }

        $this->updateIsPrivateStuff($is_private_stuff);
        $this->updateClass($class_id);
        $this->updateTitle($stuff_title);
        $this->updateCharacterGender($character_gender);
        $this->updateLevel($character_level);
        $this->updateExoPa($is_exo_pa);
        $this->updateExoPm($is_exo_pm);
        $this->updateExoPo($is_exo_po);

        $this->updateBoostVitality($boost_vitality);
        $this->updateBoostWisdom($boost_wisdom);
        $this->updateBoostStrength($boost_strength);
        $this->updateBoostIntel($boost_intel);
        $this->updateBoostLuck($boost_luck);
        $this->updateBoostAgility($boost_agility);

        $this->updateParchmentVitality($parchment_vitality);
        $this->updateParchmentWisdom($parchment_wisdom);
        $this->updateParchmentStrength($parchment_strength);
        $this->updateParchmentIntel($parchment_intel);
        $this->updateParchmentLuck($parchment_luck);
        $this->updateParchmentAgility($parchment_agility);

    }

    public function updateLevel(int $level)
    {
        $this->character_level = $level;
        $this->setTotalVitality();
        $this->setBoostAvailable();
        if ($level >= 100) {
            $this->total_pa = 6 + 1 + $this->is_exo_pa;
        }
        $this->stuff->character_level = $this->character_level;
        $this->stuff->save();
    }

    public function updateExoPa(int $is_exo_pa)
    {
        $this->is_exo_pa = $is_exo_pa;
        $this->stuff->is_exo_pa = $this->is_exo_pa;
        $this->stuff->save();
        $this->setPa();
    }

    public function updateExoPm(int $is_exo_pm)
    {
        $this->is_exo_pm = $is_exo_pm;
        $this->stuff->is_exo_pm = $this->is_exo_pm;
        $this->stuff->save();
        $this->setPm();
    }

    public function updateExoPo(int $is_exo_po)
    {
        $this->is_exo_po = $is_exo_po;
        $this->stuff->is_exo_po = $this->is_exo_po;
        $this->stuff->save();
        $this->setPo();
    }

    public function setPa()
    {
        $extraPaByLvl = $this->character_level >= 100 ? 1 : 0;
        $this->total_pa = 6 + $extraPaByLvl + $this->is_exo_pa + $this->stuff_pa;
    }

    public function setPm()
    {
        $this->total_pm = 3 + $this->is_exo_pm + $this->stuff_pm;
    }

    public function setPo()
    {
        $this->total_po = $this->is_exo_po + $this->stuff_po;
    }

    public function updateTitle(string $title)
    {
        $this->stuff_title = $title;

        $this->stuff->title = $this->stuff_title;
        $this->stuff->save();

    }

    public function updateClass(int $class_id)
    {
        $this->class_id = $class_id;

        $this->stuff->class_id = $this->class_id;
        $this->stuff->save();

    }

    public function updateCharacterGender(string $character_gender)
    {
        $this->character_gender = $character_gender;

        $this->stuff->gender = $this->character_gender;
        $this->stuff->save();

    }

    public function setInitiative()
    {
        $this->total_initiative = $this->subtotal_strength + $this->subtotal_intel + $this->subtotal_luck + $this->subtotal_agility + $this->stuff_initiative;
    }

    public function setTotalVitality()
    {
        $this->total_vitality = 50 + ($this->character_level * 5) + $this->subtotal_vitality;
    }

    public function setSubtotalVitality()
    {
        $this->subtotal_vitality = $this->parchment_vitality + $this->boost_vitality + $this->stuff_vitality;
        $this->setTotalVitality();
    }

    public function setSubtotalWisdom()
    {
        $this->subtotal_wisdom = $this->parchment_wisdom + $this->boost_wisdom + $this->stuff_wisdom;
        $this->setAvoidPa();
        $this->setAvoidPm();
        $this->setPaRecession();
        $this->setPmRecession();
    }

    public function setSubtotalStrength()
    {
        $this->subtotal_strength = $this->parchment_strength + $this->boost_strength + $this->stuff_strength;
        $this->setInitiative();
        $this->setPods();
    }

    public function setSubtotalIntel()
    {
        $this->subtotal_intel = $this->parchment_intel + $this->boost_intel + $this->stuff_intel;
        $this->setInitiative();
    }

    public function setSubtotalLuck()
    {
        $this->subtotal_luck = $this->parchment_luck + $this->boost_luck + $this->stuff_luck;
        $this->setInitiative();
        $this->setProspection();
    }

    public function setSubtotalAgility()
    {
        $this->subtotal_agility = $this->parchment_agility + $this->boost_agility + $this->stuff_agility;
        $this->setInitiative();
        $this->setLeak();
        $this->setTackle();
    }

    public function setAvoidPa()
    {
        $this->avoid_pa = round(floor($this->subtotal_wisdom / 10)) + $this->stuff_avoid_pa;
    }

    public function setAvoidPm()
    {
        $this->avoid_pm = round(floor($this->subtotal_wisdom / 10)) + $this->stuff_avoid_pm;
    }

    public function setPaRecession()
    {
        $this->pa_recession = round(floor($this->subtotal_wisdom / 10)) + $this->stuff_pa_recession;
    }

    public function setPmRecession()
    {
        $this->pm_recession = round(floor($this->subtotal_wisdom / 10)) + $this->stuff_pm_recession;
    }

    public function setPods()
    {
        $this->pods = 1000 + (5 * $this->subtotal_strength) + $this->stuff_pods;
    }

    public function setProspection()
    {
        $this->total_prospection = 100 + round(floor($this->subtotal_luck / 10)) + $this->stuff_prospection;
    }

    public function setLeak()
    {
        $this->leak = round(floor($this->subtotal_agility / 10)) + $this->stuff_leak;
    }

    public function setTackle()
    {
        $this->tackle = round(floor($this->subtotal_agility / 10)) + $this->stuff_tackle;
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
        $this->is_private_stuff = $is_private_stuff;
        $this->stuff->is_private = $this->is_private_stuff;
        $this->stuff->save();
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

    public function openEncyclopediaWithFilters(string $equipementType, int $maxLvl)
    {
        return redirect()->route('encyclopedia', [
            'equipementType' => $equipementType,
            'maxLvl' => $maxLvl]);
    }

    public function updateStuffCharacteristic(string $stuffCharacteristicName, int $stuffCharacteristicsValue, string $operator = "+")
    {
        $this->{"stuff_" . $stuffCharacteristicName} += $stuffCharacteristicsValue;

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
            }
        }
    }

    private function setStuffCharacteristicsToZero()
    {
        $this->stuff_vitality = 0;
        $this->stuff_strength = 0;
        $this->stuff_intel = 0;
        $this->stuff_luck = 0;
        $this->stuff_agility = 0;
        $this->stuff_wisdom = 0;
        $this->stuff_initiative = 0;
        $this->stuff_leak = 0;
        $this->stuff_avoid_pm = 0;
        $this->stuff_avoid_pa = 0;
        $this->stuff_pa_recession = 0;
        $this->stuff_pm_recession = 0;
        $this->stuff_pods = 0;
        $this->stuff_prospection = 0;
        $this->stuff_tackle = 0;
        $this->stuff_invocation = 1;
        $this->stuff_health = 0;
        $this->stuff_power = 0;
        $this->stuff_critic = 0;
        $this->stuff_pa = 0;
        $this->stuff_pm = 0;
        $this->stuff_po = 0;
        $this->stuff_neutral_res = 0;
        $this->stuff_water_res = 0;
        $this->stuff_earth_res = 0;
        $this->stuff_fire_res = 0;
        $this->stuff_air_res = 0;
        $this->stuff_percent_neutral_res = 0;
        $this->stuff_percent_water_res = 0;
        $this->stuff_percent_earth_res = 0;
        $this->stuff_percent_fire_res = 0;
        $this->stuff_percent_air_res = 0;
        $this->stuff_distance_res = 0;
        $this->stuff_critique_res = 0;
        $this->stuff_push_res = 0;
        $this->stuff_melee_res = 0;
        $this->stuff_weapon_res = 0;
        $this->stuff_do_neutral = 0;
        $this->stuff_do_earth = 0;
        $this->stuff_do_fire = 0;
        $this->stuff_do_air = 0;
        $this->stuff_do_water = 0;
        $this->stuff_do_critique = 0;
        $this->stuff_do_push = 0;
        $this->stuff_do_melee = 0;
        $this->stuff_do_distance = 0;
        $this->stuff_do_weapon = 0;
        $this->stuff_do_spell = 0;

    }

    public function deleteItemToStuff(string $columnToDelete)
    {
        $this->stuffDetail[$columnToDelete] = null;
        $this->stuff->{$columnToDelete . '_id'} = null;
        $this->stuff->save();
        $this->getStuffDetail();
        $this->resetItemsCharacteristics();
    }

    public function getStuffDetail()
    {
        foreach (array_keys($this->stuffDetail) as $aStuffItem) {
            $item_id = $this->stuff->{$aStuffItem . '_id'};
            if (!is_null($item_id)) {
                $this->stuffDetail[$aStuffItem] = Items::query()->with(['effects'])->where("id", $item_id)->get()->first();
            } else {
                $this->stuffDetail[$aStuffItem] = null;
            }
        }

    }

    public function render(): View
    {
        $this->getStuffDetail();

        return view('livewire.stuff.create', [
            'stuff_title' => $this->stuff_title,
            'character_level' => $this->character_level,

            'total_vitality' => $this->total_vitality,
            'total_prospection' => $this->total_prospection,
            'total_pa' => $this->total_pa,
            'total_pm' => $this->total_pm,
            'total_po' => $this->total_po,
            'total_initiative' => $this->total_initiative,
            'total_critique' => $this->stuff_critic,
            'total_invocation' => $this->stuff_invocation,
            'total_health' => $this->stuff_health,

            'subtotal_vitality' => $this->subtotal_vitality,
            'subtotal_wisdom' => $this->subtotal_wisdom,
            'subtotal_strength' => $this->subtotal_strength,
            'subtotal_intel' => $this->subtotal_intel,
            'subtotal_luck' => $this->subtotal_luck,
            'subtotal_agility' => $this->subtotal_agility,
            'subtotal_power' => $this->stuff_power,

            'boost_vitality' => $this->boost_vitality,
            'boost_wisdom' => $this->boost_wisdom,
            'boost_strength' => $this->boost_strength,
            'boost_intel' => $this->boost_intel,
            'boost_luck' => $this->boost_luck,
            'boost_agility' => $this->boost_agility,
            'boost_available' => $this->boost_available,

            'parchment_vitality' => $this->parchment_vitality,
            'parchment_wisdom' => $this->parchment_wisdom,
            'parchment_strength' => $this->parchment_strength,
            'parchment_intel' => $this->parchment_intel,
            'parchment_luck' => $this->parchment_luck,
            'parchment_agility' => $this->parchment_agility,

            'leak' => $this->leak,
            'avoid_pa' => $this->avoid_pa,
            'avoid_pm' => $this->avoid_pm,
            'pods' => $this->pods,

            'tackle' => $this->tackle,
            'pa_recession' => $this->pa_recession,
            'pm_recession' => $this->pm_recession,
            'stuff_level' => $this->stuff_level,

            'do_neutral' => $this->stuff_do_neutral,
            'do_earth' => $this->stuff_do_earth,
            'do_fire' => $this->stuff_do_fire,
            'do_water' => $this->stuff_do_water,
            'do_air' => $this->stuff_do_air,

            'do_critique' => $this->stuff_do_critique,
            'do_push' => $this->stuff_do_push,
            'do_weapon' => $this->stuff_do_weapon,
            'do_spell' => $this->stuff_do_spell,
            'do_melee' => $this->stuff_do_melee,
            'do_distance' => $this->stuff_do_distance,

            'neutral_res' => $this->stuff_neutral_res,
            'earth_res' => $this->stuff_earth_res,
            'fire_res' => $this->stuff_fire_res,
            'water_res' => $this->stuff_water_res,
            'air_res' => $this->stuff_air_res,
            'critique_res' => $this->stuff_critique_res,
            'melee_res' => $this->stuff_melee_res,
            'weapon_res' => $this->stuff_weapon_res,

            'percent_neutral_res' => $this->stuff_percent_neutral_res,
            'percent_earth_res' => $this->stuff_percent_earth_res,
            'percent_fire_res' => $this->stuff_percent_fire_res,
            'percent_water_res' => $this->stuff_percent_water_res,
            'percent_air_res' => $this->stuff_percent_air_res,
            'push_res' => $this->stuff_push_res,
            'distance_res' => $this->stuff_distance_res,
        ]);
    }


}
