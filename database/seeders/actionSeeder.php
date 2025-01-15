<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\action;

use DB;

class actionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actions')->insert ([
            [
            'opcvms_id' => '1',
            'statut' => 'dispo',
            'VL' => 10,
            ],
        ]);
    }
}
