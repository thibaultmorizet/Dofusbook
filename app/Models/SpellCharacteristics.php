<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpellCharacteristics extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'spell_id',
        'is_level1',
        'is_level2',
        'is_level3',
        'carac_order',
        'pa',
        'po',
        'ir',
        'cc',
        'cc_rate',
        'lt',
        'ltj',
        'cu',
        'zo',
        'zo_zo',
        'zo_po',
        'pb',
        'lel',
        'ldv',
        'led',
        'irg'
    ];

    public function spell(): BelongsTo
    {
        return $this->belongsTo(Spells::class, "spell_id", "id");
    }
}
