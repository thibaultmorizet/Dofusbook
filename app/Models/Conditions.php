<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Conditions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'operator',
        'int_value',
        'item_id'
    ];

    public function item(): HasOne
    {
        return $this->hasOne(Items::class, "effect_id", "id");
    }

}
