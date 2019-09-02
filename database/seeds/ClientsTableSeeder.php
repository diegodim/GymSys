<?php

use Illuminate\Database\Seeder;
use App\Models\Person;
use App\Models\Client;
use Faker\Factory as Faker;
class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i< 20; $i++)
        {

            $faker = Faker::create();
            $faker->addProvider(new \JansenFelipe\FakerBR\FakerBR($faker));
            $person = Person::create([
                'name'          =>  $faker->name,
                'cpf'           =>  $faker->cpf,
                'public_place'  =>  $faker->streetAddress,
                'city'          =>  $faker->city,
                'postal'        =>  $faker->randomDigit,
                'id_number'     =>  $faker->cpf,
                'phone'         =>  $faker->randomDigit,
            ]);

            Client::create([
                'id'                => $person->id,
                'biometric_hash'    => bcrypt($i),

            ]);
        }
    }
}
