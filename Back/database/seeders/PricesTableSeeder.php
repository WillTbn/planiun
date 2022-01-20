<?php

namespace Database\Seeders;

use App\Models\Prices;
use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prices::create([
            'code_id'=> 1,
            'minimum_lives'=> 1,
            'range1'=> 10.00,
            'range2'=> 12,
            'range3'=> 15.00
        ]);
        Prices::create([
            'code_id'=> 1,
            'minimum_lives'=> 4,
            'range1'=> 9,
            'range2'=> 11.00,
            'range3'=> 14.00
        ]);
        Prices::create([
            'code_id'=> 2,
            'minimum_lives'=> 1,
            'range1'=> 20.00,
            'range2'=> 30,
            'range3'=> 40.00
        ]);
        Prices::create([
            'code_id'=> 3,
            'minimum_lives'=> 1,
            'range1'=> 30,
            'range2'=> 40.00,
            'range3'=> 50
        ]);
        Prices::create([
            'code_id'=> 4,
            'minimum_lives'=> 1,
            'range1'=> 40.00,
            'range2'=> 50.00,
            'range3'=> 60
        ]);
        Prices::create([
            'code_id'=> 5,
            'minimum_lives'=> 1,
            'range1'=> 50,
            'range2'=> 60.00,
            'range3'=> 70.00
        ]);
        Prices::create([
            'code_id'=> 6,
            'minimum_lives'=> 1,
            'range1'=> 60,
            'range2'=> 70,
            'range3'=> 80
        ]);
        Prices::create([
            'code_id'=> 6,
            'minimum_lives'=> 2,
            'range1'=> 55.00,
            'range2'=> 65.00,
            'range3'=> 75.00
        ]);
    }
}
