<?php

use App\Major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Major::create([
            'name' => 'MM1'
        ]);

        Major::create([
            'name' => 'MM2'
        ]);

        Major::create([
            'name' => 'RPL'
        ]);

    }
}
