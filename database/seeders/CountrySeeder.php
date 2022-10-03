<?php

namespace Database\Seeders;

use App\Models\Countries;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Countries::create([
            'slug' => 'azerbaycan',
            'title' => 'Azerbaycan',
            'search_title' => 'Azerbaycan',
            'shortened' => 'Az',
            'meta_titul' => 'Azerbaycan',
            'meta_description' => 'Azerbaycan',
            'meta_keywords' => 'Azerbaycan',
            'meta_H1' => 'Azerbaycan',
            'for_sanatorium' => 1,
            'country_number_prefix' => 'Azerbaycan',
            'flag' => '62b1a64ca46f5.png',
            'cover' => '630c61d00c40f.jpg',
            'status' => 1,
        ]);
    }
}
