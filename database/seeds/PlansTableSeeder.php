<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            ['name' => 'Mensal', 'description' => 'Plano Mensal.', 'months' => 1],
            ['name' => 'Anual', 'description' => 'Plano anaual.', 'months' => 12],
        ]);
    }
}
