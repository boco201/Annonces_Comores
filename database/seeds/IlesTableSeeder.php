<?php

use Illuminate\Database\Seeder;
use App\Models\Ile;

class IlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ile::create([
            'name' => 'Anjouan'
        ]);

        Ile::create([
            'name' => 'Mohéli'
        ]);

        Ile::create([
            'name' => 'Mayotte'
        ]);

        Ile::create([
            'name' => 'Grande Comore'
        ]);

        Ile::create([
            'name' => 'Madagascar'
        ]);

        Ile::create([
            'name' => 'La Réunion'
        ]);

        Ile::create([
            'name' => 'Maurice'
        ]);

        Ile::create([
            'name' => 'Maldives'
        ]);

        Ile::create([
            'name' => 'Seychelles'
        ]);
    }
}
