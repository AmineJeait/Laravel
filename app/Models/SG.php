<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SG extends Model
{
    protected $fillable = [
        'Nom',
        ];
    public function opcvms(){
        $this->HasMany(opcvms::class);
    }
}
