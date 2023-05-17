<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpellEffects extends Model
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
        'duration',
        'dommage_group_id'
    ];
    public function dommageGroup(): BelongsTo
    {
        return $this->belongsTo(DommageGroups::class, "dommage_group_id", "id");
    }
}
