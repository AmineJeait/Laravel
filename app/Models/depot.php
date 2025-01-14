<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class depot extends Model
{

    protected $fillable = [
        'Montant',
        'users_id'
    ];
    public function depot(){
        $this->belongsTo(Client::class);
    }


}
