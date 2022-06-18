<?php

namespace Database\Seeders;

use App\Models\Annonce;
use App\Models\Secteur;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AnnonceSeeder extends Seeder
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
            Annonce::create([
                'titre_annonce'=>$faker->text(10),
                'description_annonce'=>$faker->paragraph(mt_rand(1, 2)),
                'type_annonce'=>$faker->randomElement(['Candidat', 'Recruteur']),
                'niveau_etude'=>$faker->randomElement(['BAC+2', 'BAC+3', 'BAC+5', 'Technicien', 'Qualifier']),
                'secteur_activite'=>Secteur::all('titre_secteur')->random()->titre_secteur,
                'user_id'=>User::all('id')->random()->id,
       
            ]);
        }
    }
}
