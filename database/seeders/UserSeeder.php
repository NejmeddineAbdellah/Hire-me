<?php

namespace Database\Seeders;

use App\Models\Secteur;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        for ($i=0;$i<=7;$i++){
            User::create([
                'username'=>$faker->text(10),
                'email'=>$faker->lexify('????'.'@gmail.com'),
                'password'=>$faker->password,
                'tele'=>$faker-> numerify('+212-'.'###-###-###'),
                'ville'=>$faker->text(8),
                'role'=>$faker->randomElement(['Candidat', 'Recruteur', 'Admin']),
                'secteur_activite'=>Secteur::all('titre_secteur')->random()->titre_secteur,
               
            ]);
        }
    }
}
