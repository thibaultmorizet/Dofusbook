<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'class_id',
        'slug'
    ];

    public function stuffs(): HasMany
    {
        return $this->HasMany(Stuffs::class, "class_id");
    }

    public function spells(): HasMany
    {
        return $this->HasMany(Spells::class, "class_id");
    }
}
