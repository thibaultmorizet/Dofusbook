<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'dofus_6_id'
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
