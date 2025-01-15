<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\opcvms;
class OpcvmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        opcvms::create([
            'Nom'=>'Opcvm1',
            's_g_s_id'=>1
        ]);
    }
}
