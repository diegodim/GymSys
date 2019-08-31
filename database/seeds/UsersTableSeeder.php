<?php
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $person = Person::create([
            'name'          =>  'Diego Duarte',
            'cpf'           =>  '09830624633',
            'id_number'     =>  'MG15852721',
            'phone'         =>  '38984128286',
        ]);

        User::create([
            'id'        => $person->id,
            'email'     => 'dinboc@gmail.com',
            'password'  => bcrypt('04120202'),
        ]);
    }
}
