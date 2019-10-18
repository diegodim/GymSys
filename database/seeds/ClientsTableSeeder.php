<?php

use Illuminate\Database\Seeder;
use App\Models\Person;
use App\Models\Client;
use App\Models\Payment;
class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i< 50; $i++)
        {

            $faker = \Faker\Factory::create('pt_BR');
            $faker->addProvider(new \JansenFelipe\FakerBR\FakerBR($faker));
            $person = Person::create([
                'name'          =>  $faker->firstName.' '.$faker->lastName,
                'cpf'           =>  $faker->cpf,
                'adress'        =>  $faker->streetAddress,
                'city'          =>  'Belo Horizonte',
                'neighborhood'  =>  'Centro',
                'state_id'      =>  13,
                'postal'        =>  $faker->numberBetween(30000000, 39999999),
                'id_number'     =>  'MG'.$faker->unique(true)->numberBetween(15852730, 99999999),
                'phone'         =>  $faker->unique(true)->numberBetween(31999000000, 31999999999),
            ]);

            Client::create([
                'id'                => $person->id,
                'plan_id'           => 1,
                'biometric_hash'    => bcrypt($i),
            ]);
            $date = $faker->dateTimeBetween($startDate = '-33 days', $endDate = '-25 days', $timezone = null);
            Payment::create([
                'client_id'         =>  $person->id,
                'user_id'           =>  1,
                'paid_at'           =>  $date,
                'due_at'            =>  Carbon\Carbon::parse($date)->addDays(30),
                'value'             =>  65.00,
            ]);
        }
    }
}
