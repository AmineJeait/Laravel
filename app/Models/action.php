<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class action extends Model
{
    protected $fillable = [
        'VL',
        'dispo',
    ];

    

    public function action(){
        $this->belongsTo(Depot::class);
    }

    public function opcvm(){
        $this->belongsTo(Opcvm::class);
    }
    
}
