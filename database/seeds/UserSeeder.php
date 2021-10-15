
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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('admin'),
        ]);
        $admin->assignRole('admin');

        $teacher = User::create([
            'name'      => 'teacher',
            'email'     => 'teacher@gmail.com',
            'password'  => Hash::make('teacher'),
        ]);
        $teacher->assignRole('teacher');

        $student = User::create([
            'name'      => 'student',
            'email'     => 'student@gmail.com',
            'password'  => Hash::make('student'),
        ]);
        $student->assignRole('student');
    }
}
