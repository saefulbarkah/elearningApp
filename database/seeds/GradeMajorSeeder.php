<?php

use App\GradeMajor;
use Illuminate\Database\Seeder;

class GradeMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeMajor::create([
            'grade_id' => '1',
            'major_id' => '1',
            'group' => '1'
        ]);

        GradeMajor::create([
            'grade_id' => '1',
            'major_id' => '1',
            'group' => '2'
        ]);

        GradeMajor::create([
            'grade_id' => '1',
            'major_id' => '2',
            'group' => '1'
        ]);

        GradeMajor::create([
            'grade_id' => '2',
            'major_id' => '1',
            'group' => '1'
        ]);

        GradeMajor::create([
            'grade_id' => '2',
            'major_id' => '1',
            'group' => '2'
        ]);

        GradeMajor::create([
            'grade_id' => '2',
            'major_id' => '2',
            'group' => '1'
        ]);

        GradeMajor::create([
            'grade_id' => '3',
            'major_id' => '1',
            'group' => '1'
        ]);

        GradeMajor::create([
            'grade_id' => '3',
            'major_id' => '1',
            'group' => '2'
        ]);

        GradeMajor::create([
            'grade_id' => '3',
            'major_id' => '2',
            'group' => '1'
        ]);
    }
}
