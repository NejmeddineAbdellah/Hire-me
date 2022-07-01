<?php

namespace Database\Seeders;

use App\Models\Annonce;
use App\Models\Candidat;
use App\Models\Demande;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DemandeSeeder extends Seeder
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
            Demande::create([
                'lettre_motivation'=>$faker->paragraph(mt_rand(1, 2)),
                'user_id'=>User::all('id')->random()->id,
                'id_annonce'=>Annonce::all('id')->random()->id,
               
            ]);
        }

    }
}
