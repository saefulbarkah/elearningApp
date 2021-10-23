<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // s1
        Student::create([
            'user_id' => '3',
            'grade_major_id' => '1',
            'nis' => '19201021',
            'gender' => 'L',
            'religion' => 'Islam',
            'image' => 'student-l.png',
            'address' => 'Kp.bojong'
        ]);

        // s2
        Student::create([
            'user_id' => '4',
            'grade_major_id' => '3',
            'nis' => '19201022',
            'gender' => 'L',
            'religion' => 'Islam',
            'image' => 'student-l.png',
            'address' => 'Kp.sompok'
        ]);
    }
}
