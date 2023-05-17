<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spells extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'class_id',
        'name',
        'summary',
        'image',
        'spell_group',
        'level1',
        'level2',
        'level3',
        'is_invoc',
        'is_variante',
        'sum_damages',
        'md5'
    ];

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, "class_id", "id");
    }

    public function spellCharacteristics(): HasMany
    {
        return $this->HasMany(SpellCharacteristics::class, "spell_id");
    }

    public function dommageGroups(): HasMany
    {
        return $this->HasMany(DommageGroups::class, "spell_id");
    }
}
