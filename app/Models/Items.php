<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Items extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'summary',
        'type_id',
        'set_id',
        'level',
        'pods',
        'is_weapon',
        'image',
        'critical_hit_probability',
        'critical_hit_bonus',
        'is_two_handed',
        'max_cast_per_turn',
        'ap_cost',
        'range_min',
        'range_max',
        'md5'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Types::class, "type_id", "id");
    }

    public function set(): BelongsTo
    {
        return $this->belongsTo(Sets::class, "set_id", "id");
    }

    public function effects(): HasMany
    {
        return $this->HasMany(Effects::class, "item_id", "id");
    }

    public function ressources(): HasMany
    {
        return $this->HasMany(Ressources::class, "item_id", "id");
    }

    public function conditions(): HasMany
    {
        return $this->HasMany(Conditions::class, "item_id", "id");
    }
}
