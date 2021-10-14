<?php

use App\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            'name' => 'X'
        ]);

        Grade::create([
            'name' => 'XI'
        ]);

        Grade::create([
            'name' => 'XII'
        ]);

    }
}
