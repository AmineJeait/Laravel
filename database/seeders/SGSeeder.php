<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\SG;

class SGSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SG::create([
            'Nom'=>'SG1'
        ]);
    }
}
