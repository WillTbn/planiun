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
            'record'=> 'reg1',
            'name'=> 'Bitix Customer Plano 1'
        ]);
        Plans::create([
            'record'=> 'reg2',
            'name'=> 'Bitix Customer Plano 2'
        ]);
        Plans::create([
            'record'=> 'reg3',
            'name'=> 'Bitix Customer Plano 3'
        ]);
        Plans::create([
            'record'=> 'reg4',
            'name'=> 'Bitix Customer Plano 4'
        ]);
        Plans::create([
            'record'=> 'reg5',
            'name'=> 'Bitix Customer Plano 5'
        ]);
        Plans::create([
            'record'=> 'reg6',
            'name'=> 'Bitix Customer Plano 6'
        ]);
    }
}
