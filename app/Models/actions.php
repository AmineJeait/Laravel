<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class actions extends Model
{

    protected $fillable = [
        'status',
        'valeur',
    ];
    public function actions(){
        $this->belongsTo(depots::class);
        $this->belongsTo(opcvms::class);
    }
}
