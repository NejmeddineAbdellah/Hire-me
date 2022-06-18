<?php

namespace Database\Seeders;

use App\Models\Candidat;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        for ($i=0;$i<=9;$i++){
            Candidat::create([
                'nom_candidat'=>$faker->text(10),
                'prenom_candidat'=>$faker->text(10),
                'image_candidat'=>$faker->lexify('????'.'.jpg'),
                'niveau_etude'=>$faker->randomElement(['BAC+2', 'BAC+3', 'BAC+5', 'Technicien', 'Qualifier']),
                'cv_candidat'=>$faker->lexify('?????????'.'.pdf'),
                'user_id'=>User::all('id')->random()->id,

                
            ]);
        }
    }
}
