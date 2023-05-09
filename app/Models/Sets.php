<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sets extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'number_of_items',
        'level'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Items::class, "set_id");
    }

    public function effects(): HasMany
    {
        return $this->HasMany(Effects::class, "set_id", "id");
    }
}
