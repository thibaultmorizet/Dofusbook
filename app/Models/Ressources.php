<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ressources extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ressource_type_id',
        'level',
        'image',
        'summary',
        'md5'
    ];

    public function ressourceType(): BelongsTo
    {
        return $this->belongsTo(RessourceTypes::class, "ressource_type_id", "id");
    }
}
