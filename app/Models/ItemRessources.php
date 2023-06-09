<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemRessources extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'ressource_id',
        'item_ressource_id',
        'quantity'
    ];

    /**
     * @param string[] $fillable
     */
    public function __construct()
    {
    }

    public function item(): HasOne
    {
        return $this->hasOne(Items::class, "item_id", "id");
    }

    public function ressource(): HasOne
    {
        return $this->hasOne(Ressources::class, "id", "ressource_id");
    }

    public function itemRessource(): HasOne
    {
        return $this->hasOne(Items::class, "id", "item_ressource_id");
    }
}
