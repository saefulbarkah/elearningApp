<?php

use App\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'user_id' => '2',
            'nip' => '111123456',
            'gender' => 'Laki-laki',
            'religion' => 'Islam',
            'address' => 'Kp.Citereup'
        ]);

        Teacher::create([
            'user_id' => '3',
            'nip' => '111133456',
            'gender' => 'Perempuan',
            'religion' => 'Islam',
            'address' => 'Kp.Ciborerang'
        ]);

        Teacher::create([
            'user_id' => '4',
            'nip' => '111144567',
            'gender' => 'Laki-laki',
            'religion' => 'Islam',
            'address' => 'Kp.Pesantren'
        ]);
    }
}
