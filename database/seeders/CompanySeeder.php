<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'country_id' => 1,
            'city_id' => 1,
            'name' => 'Company MMC',
            'related_person' => 'Cavid Şıxıyev',
            'address' => 'Ahmad Rajabli',
            'postal_code' => 'AZ1000',
            'representative' => 'Cavid Şıxıyev',
            'tax_number' => '156 565 887',
            'voen' => 'Yoxdur',
            'contact_number' => '+994 50 822 1300',
            'email' => 'chaparoglucavid@gmail.com',
            'status' => 1,
        ]);
    }
}
