<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stuffs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'class_id',
        'is_private',
        'character_level',
        'gender',
        'title',
        'is_exo_pa',
        'is_exo_pm',
        'is_exo_po',
        'vitality_boost',
        'intel_boost',
        'agility_boost',
        'strength_boost',
        'luck_boost',
        'wisdom_boost',
        'boost_available',
        'vitality_parchment',
        'intel_parchment',
        'agility_parchment',
        'strength_parchment',
        'luck_parchment',
        'wisdom_parchment',
        'amulet_id',
        'shield_id',
        'ring_1_id',
        'belt_id',
        'boots_id',
        'hat_id',
        'weapon_id',
        'ring_2_id',
        'cape_id',
        'animal_id',
        'dofus_1_id',
        'dofus_2_id',
        'dofus_3_id',
        'dofus_4_id',
        'dofus_5_id',
        'dofus_6_id',
        'total_vitality',
        'total_prospection',
        'total_pa',
        'total_pm',
        'total_po',
        'total_initiative',
        'subtotal_vitality',
        'subtotal_intel',
        'subtotal_agility',
        'subtotal_strength',
        'subtotal_luck',
        'subtotal_wisdom',
        'leak',
        'avoid_pa',
        'avoid_pm',
        'pods',
        'tackle',
        'pa_recession',
        'pm_recession',
        'stuff_level',
        'stuff_vitality',
        'stuff_strength',
        'stuff_intel',
        'stuff_luck',
        'stuff_agility',
        'stuff_wisdom',
        'stuff_initiative',
        'stuff_leak',
        'stuff_avoid_pm',
        'stuff_avoid_pa',
        'stuff_pa_recession',
        'stuff_pm_recession',
        'stuff_pods',
        'stuff_prospection',
        'stuff_tackle',
        'stuff_invocation',
        'stuff_health',
        'stuff_power',
        'stuff_critic',
        'stuff_pa',
        'stuff_pm',
        'stuff_po',
        'stuff_neutral_res',
        'stuff_luck_res',
        'stuff_strength_res',
        'stuff_intel_res',
        'stuff_agility_res',
        'stuff_percent_neutral_res',
        'stuff_percent_luck_res',
        'stuff_percent_strength_res',
        'stuff_percent_intel_res',
        'stuff_percent_agility_res',
        'stuff_distance_res',
        'stuff_critique_res',
        'stuff_push_res',
        'stuff_melee_res',
        'stuff_weapon_res',
        'stuff_do_neutral',
        'stuff_do_strength',
        'stuff_do_intel',
        'stuff_do_agility',
        'stuff_do_luck',
        'stuff_do_critique',
        'stuff_do_push',
        'stuff_do_melee',
        'stuff_do_distance',
        'stuff_do_weapon',
        'stuff_do_spell'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, "user_id", "id");
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, "class_id", "id");
    }
}
