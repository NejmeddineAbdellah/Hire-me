<?php

namespace Database\Seeders;

use App\Models\Secteur;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        for ($i=0;$i<=4;$i++){
            Secteur::create([
                'titre_secteur'=>$faker->randomElement(['Web developpement', 'Mobile Developpement', 'Desktop Deveoppement', 'Administration Reaseau', 'IT Developper', 'Comptable', 'SEO', 'Avocado']),
            ]);
        }
    }
}
