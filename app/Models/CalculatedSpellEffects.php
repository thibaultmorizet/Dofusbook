<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CalculatedSpellEffects extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'level',
        'effect',
        'cc',
        'min',
        'max',
        'min_melee',
        'max_melee',
        'min_distance',
        'max_distance',
        'duration',
        'spell_effect_id',
        'stuff_id'
    ];
    public function spellEffect(): BelongsTo
    {
        return $this->belongsTo(SpellEffects::class, "spell_effect_id", "id");
    }
}
