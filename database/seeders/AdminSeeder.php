<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'Cavid',
            'surname'=>'Şıxıyev',
            'email'=>'chaparoglucavid@gmail.com',
            'password'=>Hash::make('salamadmin')
        ]);
    }
}
