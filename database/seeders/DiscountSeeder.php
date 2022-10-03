<?php

namespace Database\Seeders;

use App\Models\Discounts;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discounts::create([
            'discount_name' => 'Günə görə endirim',
            'status'        => 1
        ]);

        Discounts::create([
            'discount_name' => 'Gələn günə qədər - endirimi',
            'status'        => 1
        ]);

        Discounts::create([
            'discount_name' => 'Sifariş olunan günə görə - endirim',
            'status'        => 1
        ]);

        Discounts::create([
            'discount_name' => 'Ümumi endirim',
            'status'        => 1
        ]);

        Discounts::create([
            'discount_name' => 'Yalançı endirim',
            'status'        => 1
        ]);
    }
}
