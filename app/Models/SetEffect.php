<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetEffect extends Model
{
    public function set(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Set::class, 'set_id', 'id');
    }

    public function effect(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Effect::class, 'effect_id', 'id');
    }
}
