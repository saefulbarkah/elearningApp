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
            'name' => 'Rekayasa Perangkat Lunak'
        ]);

        Major::create([
            'name' => 'Multimedia'
        ]);

    }
}
