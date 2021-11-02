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
            'address' => 'Kp.Citereup',
            'image'  => 'student-l.png',
        ]);
    }
}
