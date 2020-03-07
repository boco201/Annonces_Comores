<?php

use Illuminate\Database\Seeder;
use App\Models\Identite;

class IdentitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Identite::create([
            'name' => 'Particulier'
          ]);

          Identite::create([
            'name' => 'Professionnel'
          ]);
    }
}
