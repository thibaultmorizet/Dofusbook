<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(Classe::class, 'class_id', 'id');
    }
}
