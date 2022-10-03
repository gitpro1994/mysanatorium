<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        // $this->call(CountrySeeder::class);
        // $this->call(CitySeeder::class);
        // $this->call(CompanySeeder::class);
        $this->call(CurrencySeeder::class);
        // $this->call(DiscountSeeder::class);
        // $this->call(RoomKindSeeder::class);
    }
}
