<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class depot extends Model
{

    protected $fillable = [
        'Montant',
        'users_id',
        'type',
        'frais'
    ];

    
    public function depot(){
        $this->belongsTo(User::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

}
