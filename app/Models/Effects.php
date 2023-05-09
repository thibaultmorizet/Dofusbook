<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Effects extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'translated_name',
        'int_minimum',
        'int_maximum',
        'ignore_int_min',
        'ignore_int_max',
        'formatted_name',
        'item_id',
        'set_id',
        'set_number_items'
    ];

    public function item(): HasOne
    {
        return $this->hasOne(Items::class, "effect_id", "id");
    }

    public function set(): HasOne
    {
        return $this->hasOne(Items::class, "effect_id", "id");
    }
}
