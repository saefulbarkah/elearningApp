
<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for admin 'a'
        // a1
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('admin'),
        ]);
        $admin->assignRole('admin');

        // for teacher 't'
        // t1
        $teacher = User::create([
            'name'      => 'Raynaldi Syahputra Nonci',
            'email'     => 'raynaldi@gmail.com',
            'password'  => Hash::make('12345678'),
        ]);
        $teacher->assignRole('teacher');

        // for student 's'
        // s1
        $student = User::create([
            'name'      => 'Saeful Barkah',
            'email'     => 'saefulbarkah650@gmail.com',
            'password'  => Hash::make('12345678'),
        ]);
        $student->assignRole('student');

        // s2
        $student = User::create([
            'name'      => 'Deden Alif',
            'email'     => 'denlif@gmail.com',
            'password'  => Hash::make('12345678'),
        ]);
        $student->assignRole('student');

        $student = User::create([
            'name'      => 'Rifaldi',
            'email'     => 'rifaldipratama2004@gmail.com',
            'password'  => Hash::make('12345678'),
        ]);
        $student->assignRole('student');
    }
}
