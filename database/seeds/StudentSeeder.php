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
            'grade_major_id' => '9',
            'nis' => '19201021',
            'image' => 'student-l.png',
            'address' => 'Kp.bojong'
        ]);

        // s2
        Student::create([
            'user_id' => '4',
            'grade_major_id' => '9',
            'nis' => '19201022',
            'image' => 'student-l.png',
            'address' => 'Kp.sompok'
        ]);

        // s3
        Student::create([
            'user_id' => '5',
            'grade_major_id' => '9',
            'nis' => '19201023',
            'image' => 'student-l.png',
            'address' => 'Kp.Junti Hilir'
        ]);

        // s4
        Student::create([
            'user_id' => '6',
            'grade_major_id' => '9',
            'nis' => '19201024',
            'image' => 'student-l.png',
            'address' => 'Bandung'
        ]);
    }
}
