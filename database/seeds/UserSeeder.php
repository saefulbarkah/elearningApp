
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
            'gender' => 'L',
            'religion' => 'Islam'
        ]);
        $teacher->assignRole('teacher');

        // for student 's'
        // s1
        $student = User::create([
            'name'      => 'Saeful Barkah',
            'email'     => 'saefulbarkah650@gmail.com',
            'password'  => Hash::make('12345678'),
            'gender' => 'L',
            'religion' => 'Islam'
        ]);
        $student->assignRole('student');

        // s2
        $student = User::create([
            'name'      => 'Deden Alif',
            'email'     => 'denlif34690@gmail.com',
            'password'  => Hash::make('12345678'),
            'gender' => 'L',
            'religion' => 'Islam'
        ]);
        $student->assignRole('student');

        // s3
        $student = User::create([
            'name'      => 'Rifaldi Satya Pratama',
            'email'     => 'rifaldipratama2004@gmail.com',
            'password'  => Hash::make('12345678'),
            'gender' => 'L',
            'religion' => 'Islam'
        ]);
        $student->assignRole('student');

        //s4
        $student = User::create([
            'name'      => 'Dendi Setia Maulidin',
            'email'     => 'dendisetiamaja@gmail.com',
            'password'  => Hash::make('12345678'),
            'gender' => 'L',
            'religion' => 'Islam'
        ]);
        $student->assignRole('student');
    }
}
