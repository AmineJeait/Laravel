<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\actions;
class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        actions::create([
            'status'=>'true',
            'valeur'=>1000,
            'depots_id'=> 1,
            'opcvms_id'=> 1
        ]);

        actions::create([
            'status'=>'true',
            'valeur'=>10000,
            'depots_id'=> 1,
            'opcvms_id'=> 1
        ]);
    }
}
