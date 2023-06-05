<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RessourceTypes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    public function ressources(): HasMany
    {
        return $this->hasMany(Ressources::class, "ressource_type_id" );
    }

}
