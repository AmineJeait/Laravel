<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\opcvm;

class opcvmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        opcvm::create([
            'nom' => 'OPCVM 1',
            'sgs_id' => '1'
        ]);
    }
}
