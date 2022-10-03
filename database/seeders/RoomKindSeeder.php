<?php

namespace Database\Seeders;

use App\Models\RoomKinds;
use Illuminate\Database\Seeder;

class RoomKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomKinds::create([
            'name'          => '1 nəfərlik standart otaq',
            'description'   => 'This is a test content',
            'status'        => 1
        ]);

        RoomKinds::create([
            'name'          => '2 nəfərlik standart otaq',
            'description'   => 'This is a test content',
            'status'        => 1
        ]);

        RoomKinds::create([
            'name'          => '1 nəfərlik lyuks otaq',
            'description'   => 'This is a test content',
            'status'        => 1
        ]);

        RoomKinds::create([
            'name'          => '2 nəfərlik lyuks otaq',
            'description'   => 'This is a test content',
            'status'        => 1
        ]);
    }
}
