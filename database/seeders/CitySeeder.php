<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cities::create([
           'country_id' => 1,
           'slug' => 'lenkeran',
           'title' => 'Lənkəran',
           'search_title' => 'Lənkəran',
           'status' => 1
        ]);

        Cities::create([
            'country_id' => 1,
            'slug' => 'baki',
            'title' => 'Bakı',
            'search_title' => 'Bakı',
            'status' => 1
        ]);
    }
}
