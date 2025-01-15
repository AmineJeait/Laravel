<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class opcvm extends Model
{
    public function action()
    {
        return $this->hasMany(Action::class);
    }

    public function sg(){
        return $this->belongsTo(Sg::class);
    }
}
