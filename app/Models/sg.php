<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sg extends Model
{
    public function actions()
    {
        return $this->hasMany(Opcvm::class);
    }
}
