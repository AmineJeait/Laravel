<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{

    protected $fillable = [
        'users_id',
        'montant',
        'type',
    ];


    public function transaction(){
        $this->belongsTo(User::class);
    }
}
