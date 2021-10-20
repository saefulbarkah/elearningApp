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
        Student::create([
            'user_id' => '5',
            'nis' => '1920.10.21',
            'gender' => 'Laki-laki',
            'religion' => 'Islam',
            'address' => 'Kp.Sukamaju'
        ]);

        Student::create([
            'user_id' => '6',
            'nis' => '1920.10.22',
            'gender' => 'Perempuan',
            'religion' => 'Islam',
            'address' => 'Kp.Bojong'
        ]);

        Student::create([
            'user_id' => '7',
            'nis' => '1920.10.23',
            'gender' => 'Laki-laki',
            'religion' => 'Islam',
            'address' => 'Kp.Pesantren'
        ]);
    }
}
