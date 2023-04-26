<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemEffect extends Model
{
    public function item(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function effect(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Effect::class, 'effect_id', 'id');
    }
}
