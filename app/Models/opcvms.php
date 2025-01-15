<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class opcvms extends Model
{
 

    protected $fillable = [
                'Nom',
                's_g_s_id'
        ];
    
    public function actions(){
        $this->HasMany(actions::class);
    }
    public function opcvms(){
        $this->belongsTo(SG::class);
    }
}
