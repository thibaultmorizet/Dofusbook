<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DommageGroups extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order',
        'title',
        'spell_id'
    ];

    public function spell(): BelongsTo
    {
        return $this->belongsTo(Spells::class, "spell_id", "id");
    }

    public function spellEffects(): HasMany
    {
        return $this->HasMany(SpellEffects::class, "dommage_group_id");
    }
}
