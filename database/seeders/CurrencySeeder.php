<?php

namespace Database\Seeders;

use App\Models\Currencies;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currencies::create([
           'slug' => 'azn',
           'code' => 'AZN',
           'title' => 'Azərbaycan manatı',
           'currency' => '1.7',
           'symbol' => '₼',
           'status' => 1
        ]);
    }
}
