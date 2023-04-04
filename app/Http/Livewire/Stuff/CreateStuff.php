<?php

namespace App\Http\Livewire\Stuff;

use App\Models\Stuff;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class CreateStuff extends Component
{
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
    public int $total_critique = 0;
    public int $total_invocation = 1;
    public int $total_soin = 0;

    public int $subtotal_vitality = 0;
    public int $subtotal_wisdom = 0;
    public int $subtotal_strength = 0;
    public int $subtotal_intel = 0;
    public int $subtotal_luck = 0;
    public int $subtotal_agility = 0;
    public int $subtotal_power = 0;

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

    public int $do_neutral = 0;
    public int $do_earth = 0;
    public int $do_fire = 0;
    public int $do_water = 0;
    public int $do_air = 0;

    public int $do_critique = 0;
    public int $do_push = 0;
    public int $do_weapon = 0;
    public int $do_spell = 0;
    public int $do_melee = 0;
    public int $do_distance = 0;

    public int $neutral_res = 0;
    public int $earth_res = 0;
    public int $fire_res = 0;
    public int $water_res = 0;
    public int $air_res = 0;
    public int $critique_res = 0;
    public int $melee_res = 0;
    public int $weapon_res = 0;

    public int $percent_neutral_res = 0;
    public int $percent_earth_res = 0;
    public int $percent_fire_res = 0;
    public int $percent_water_res = 0;
    public int $percent_air_res = 0;
    public int $push_res = 0;
    public int $distance_res = 0;

    public function mount()
    {
    }

    public function updateLevel(int $level)
    {
        $this->character_level = $level;
        $this->setTotalVitality();
        $this->setBoostAvailable();
        if ($level >= 100) {
            $this->total_pa = 6 + 1;
        }
    }

    public function updateExoPa()
    {
        if ($this->is_exo_pa === 1) {
            $this->total_pa--;
        }
        if ($this->is_exo_pa === 0) {
            $this->total_pa++;
        }
        $this->is_exo_pa = !$this->is_exo_pa;
    }

    public function updateExoPm()
    {
        if ($this->is_exo_pm === 1) {
            $this->total_pm--;
        }
        if ($this->is_exo_pm === 0) {
            $this->total_pm++;
        }
        $this->is_exo_pm = !$this->is_exo_pm;
    }

    public function updateExoPo()
    {
        if ($this->is_exo_po === 1) {
            $this->total_po--;
        }
        if ($this->is_exo_po === 0) {
            $this->total_po++;
        }
        $this->is_exo_po = !$this->is_exo_po;
    }

    public function updateTitle(string $title)
    {
        $this->stuff_title = $title;
    }

    public function setInitiative()
    {
        $this->total_initiative = $this->subtotal_strength + $this->subtotal_intel + $this->subtotal_luck + $this->subtotal_agility;
    }

    public function setTotalVitality()
    {
        $this->total_vitality = 50 + ($this->character_level * 5) + $this->subtotal_vitality;
    }

    public function setSubtotalVitality()
    {
        $this->subtotal_vitality = $this->parchment_vitality + $this->boost_vitality;
        $this->setTotalVitality();
    }

    public function setSubtotalWisdom()
    {
        $this->subtotal_wisdom = $this->parchment_wisdom + $this->boost_wisdom;
        $this->setAvoidPa();
        $this->setAvoidPm();
        $this->setPaRecession();
        $this->setPmRecession();
    }

    public function setSubtotalStrength()
    {
        $this->subtotal_strength = $this->parchment_strength + $this->boost_strength;
        $this->setInitiative();
        $this->setPods();
    }

    public function setSubtotalIntel()
    {
        $this->subtotal_intel = $this->parchment_intel + $this->boost_intel;
        $this->setInitiative();
    }

    public function setSubtotalLuck()
    {
        $this->subtotal_luck = $this->parchment_luck + $this->boost_luck;
        $this->setInitiative();
        $this->setProspection();
    }

    public function setSubtotalAgility()
    {
        $this->subtotal_agility = $this->parchment_agility + $this->boost_agility;
        $this->setInitiative();
        $this->setLeak();
        $this->setTackle();
    }

    public function setAvoidPa()
    {
        $this->avoid_pa = round(floor($this->subtotal_wisdom / 10));
    }

    public function setAvoidPm()
    {
        $this->avoid_pm = round(floor($this->subtotal_wisdom / 10));
    }

    public function setPaRecession()
    {
        $this->pa_recession = round(floor($this->subtotal_wisdom / 10));
    }

    public function setPmRecession()
    {
        $this->pm_recession = round(floor($this->subtotal_wisdom / 10));
    }

    public function setPods()
    {
        $this->pods = 1000 + (5 * $this->subtotal_strength);
    }

    public function setProspection()
    {
        $this->total_prospection = 100 + round(floor($this->subtotal_luck / 10));
    }

    public function setLeak()
    {
        $this->leak = round(floor($this->subtotal_agility / 10));
    }

    public function setTackle()
    {
        $this->tackle = round(floor($this->subtotal_agility / 10));
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
    }

    public function updateParchmentWisdom(int $parchment_wisdom)
    {
        $this->parchment_wisdom = $parchment_wisdom;
        $this->setSubtotalWisdom();
    }

    public function updateParchmentStrength(int $parchment_strength)
    {
        $this->parchment_strength = $parchment_strength;
        $this->setSubtotalStrength();
    }

    public function updateParchmentIntel(int $parchment_intel)
    {
        $this->parchment_intel = $parchment_intel;
        $this->setSubtotalIntel();
    }

    public function updateParchmentLuck(int $parchment_luck)
    {
        $this->parchment_luck = $parchment_luck;
        $this->setSubtotalLuck();
    }

    public function updateParchmentAgility(int $parchment_agility)
    {
        $this->parchment_agility = $parchment_agility;
        $this->setSubtotalAgility();
    }


    public function updateBoostVitality(int $boost_vitality)
    {
        $this->boost_vitality = $boost_vitality;
        $this->setSubtotalVitality();
        $this->setBoostAvailable();
    }

    public function updateBoostWisdom(int $boost_wisdom)
    {
        $this->boost_wisdom = $boost_wisdom;
        $this->setSubtotalWisdom();
        $this->setBoostAvailable();
    }

    public function updateBoostStrength(int $boost_strength)
    {
        $this->boost_strength = $boost_strength;
        $this->setSubtotalStrength();
        $this->setBoostAvailable();
    }

    public function updateBoostIntel(int $boost_intel)
    {
        $this->boost_intel = $boost_intel;
        $this->setSubtotalIntel();
        $this->setBoostAvailable();
    }

    public function updateBoostLuck(int $boost_luck)
    {
        $this->boost_luck = $boost_luck;
        $this->setSubtotalLuck();
        $this->setBoostAvailable();
    }

    public function updateBoostAgility(int $boost_agility)
    {
        $this->boost_agility = $boost_agility;
        $this->setSubtotalAgility();
        $this->setBoostAvailable();
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

    public function saveStuff()
    {
        try {
            $newStuff = new Stuff();
            $newStuff->user_id = Auth::id();
            $newStuff->class_id = 1;
            $newStuff->is_private = $this->is_private_stuff;
            $newStuff->level = $this->character_level;
            $newStuff->gender = $this->character_gender;
            $newStuff->is_exo_pa = $this->is_exo_pa;
            $newStuff->is_exo_pm = $this->is_exo_pm;
            $newStuff->is_exo_po = $this->is_exo_po;
            $newStuff->vitality_boost = $this->boost_vitality;
            $newStuff->wisdom_boost = $this->boost_wisdom;
            $newStuff->agility_boost = $this->boost_agility;
            $newStuff->strength_boost = $this->boost_strength;
            $newStuff->intel_boost = $this->boost_intel;
            $newStuff->luck_boost = $this->boost_luck;
            $newStuff->vitality_parchment = $this->parchment_vitality;
            $newStuff->wisdom_parchment = $this->parchment_wisdom;
            $newStuff->agility_parchment = $this->parchment_agility;
            $newStuff->strength_parchment = $this->parchment_strength;
            $newStuff->intel_parchment = $this->parchment_intel;
            $newStuff->luck_parchment = $this->parchment_luck;
            $newStuff->created_at = now();


            if ($newStuff->save()) {
                session()->flash('message', 'Votre stuff a bien été enregistré.');
                return redirect()->route('dashboard');
            }

        } catch (\Exception $exception) {
            session()->flash('alert-class', 'alert-danger');
            session()->flash('message', 'Une erreur est survenue');
            return redirect()->route('stuff.create-stuff', [
                'stuff_title' => $this->stuff_title,
                'character_level' => $this->character_level,

                'total_vitality' => $this->total_vitality,
                'total_prospection' => $this->total_prospection,
                'total_pa' => $this->total_pa,
                'total_pm' => $this->total_pm,
                'total_po' => $this->total_po,
                'total_initiative' => $this->total_initiative,
                'total_critique' => $this->total_critique,
                'total_invocation' => $this->total_invocation,
                'total_soin' => $this->total_soin,

                'subtotal_vitality' => $this->subtotal_vitality,
                'subtotal_wisdom' => $this->subtotal_wisdom,
                'subtotal_strength' => $this->subtotal_strength,
                'subtotal_intel' => $this->subtotal_intel,
                'subtotal_luck' => $this->subtotal_luck,
                'subtotal_agility' => $this->subtotal_agility,
                'subtotal_power' => $this->subtotal_power,

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

                'do_neutral' => $this->do_neutral,
                'do_earth' => $this->do_earth,
                'do_fire' => $this->do_fire,
                'do_water' => $this->do_water,
                'do_air' => $this->do_air,

                'do_critique' => $this->do_critique,
                'do_push' => $this->do_push,
                'do_weapon' => $this->do_weapon,
                'do_spell' => $this->do_spell,
                'do_melee' => $this->do_melee,
                'do_distance' => $this->do_distance,

                'neutral_res' => $this->neutral_res,
                'earth_res' => $this->earth_res,
                'fire_res' => $this->fire_res,
                'water_res' => $this->water_res,
                'air_res' => $this->air_res,
                'critique_res' => $this->critique_res,
                'melee_res' => $this->melee_res,
                'weapon_res' => $this->weapon_res,

                'percent_neutral_res' => $this->percent_neutral_res,
                'percent_earth_res' => $this->percent_earth_res,
                'percent_fire_res' => $this->percent_fire_res,
                'percent_water_res' => $this->percent_water_res,
                'percent_air_res' => $this->percent_air_res,
                'push_res' => $this->push_res,
                'distance_res' => $this->distance_res,
            ]);
        }
    }

    public function render(): View
    {
        return view('livewire.stuff.create-stuff', [
            'stuff_title' => $this->stuff_title,
            'character_level' => $this->character_level,

            'total_vitality' => $this->total_vitality,
            'total_prospection' => $this->total_prospection,
            'total_pa' => $this->total_pa,
            'total_pm' => $this->total_pm,
            'total_po' => $this->total_po,
            'total_initiative' => $this->total_initiative,
            'total_critique' => $this->total_critique,
            'total_invocation' => $this->total_invocation,
            'total_soin' => $this->total_soin,

            'subtotal_vitality' => $this->subtotal_vitality,
            'subtotal_wisdom' => $this->subtotal_wisdom,
            'subtotal_strength' => $this->subtotal_strength,
            'subtotal_intel' => $this->subtotal_intel,
            'subtotal_luck' => $this->subtotal_luck,
            'subtotal_agility' => $this->subtotal_agility,
            'subtotal_power' => $this->subtotal_power,

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

            'do_neutral' => $this->do_neutral,
            'do_earth' => $this->do_earth,
            'do_fire' => $this->do_fire,
            'do_water' => $this->do_water,
            'do_air' => $this->do_air,

            'do_critique' => $this->do_critique,
            'do_push' => $this->do_push,
            'do_weapon' => $this->do_weapon,
            'do_spell' => $this->do_spell,
            'do_melee' => $this->do_melee,
            'do_distance' => $this->do_distance,

            'neutral_res' => $this->neutral_res,
            'earth_res' => $this->earth_res,
            'fire_res' => $this->fire_res,
            'water_res' => $this->water_res,
            'air_res' => $this->air_res,
            'critique_res' => $this->critique_res,
            'melee_res' => $this->melee_res,
            'weapon_res' => $this->weapon_res,

            'percent_neutral_res' => $this->percent_neutral_res,
            'percent_earth_res' => $this->percent_earth_res,
            'percent_fire_res' => $this->percent_fire_res,
            'percent_water_res' => $this->percent_water_res,
            'percent_air_res' => $this->percent_air_res,
            'push_res' => $this->push_res,
            'distance_res' => $this->distance_res,
        ]);
    }

}
