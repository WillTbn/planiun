<?php

namespace Database\Seeders;

use App\Models\Plans;
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
        Plans::create([
            'registro'=> 'reg1',
            'nome'=> 'Bitix Customer Plano 1'
        ]);
        Plans::create([
            'registro'=> 'reg2',
            'nome'=> 'Bitix Customer Plano 2'
        ]);
        Plans::create([
            'registro'=> 'reg3',
            'nome'=> 'Bitix Customer Plano 3'
        ]);
        Plans::create([
            'registro'=> 'reg4',
            'nome'=> 'Bitix Customer Plano 4'
        ]);
        Plans::create([
            'registro'=> 'reg5',
            'nome'=> 'Bitix Customer Plano 5'
        ]);
        Plans::create([
            'registro'=> 'reg6',
            'nome'=> 'Bitix Customer Plano 6'
        ]);
    }
}
