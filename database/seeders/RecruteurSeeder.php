<?php

namespace Database\Seeders;

use App\Models\Recruteur;
use App\Models\Secteur;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RecruteurSeeder extends Seeder
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
            Recruteur::create([
                'name'=>$faker->text(10),
                'logo'=>$faker->lexify('????'.'.jpg'),
                'user_id'=>User::all('id')->random()->id,
            ]);
        }
    }
}
