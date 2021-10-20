
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
        $teacher = User::create([
            'name'      => 'guru1',
            'email'     => 'guru1@gmail.com',
            'password'  => Hash::make('guru1'),
        ]);
        $teacher = User::create([
            'name'      => 'guru2',
            'email'     => 'guru2@gmail.com',
            'password'  => Hash::make('guru2'),
        ]);
        $teacher->assignRole('teacher');

        $student = User::create([
            'name'      => 'student',
            'email'     => 'student@gmail.com',
            'password'  => Hash::make('student'),
        ]);
        $student = User::create([
            'name'      => 'siswa1',
            'email'     => 'siswa1@gmail.com',
            'password'  => Hash::make('siswa1'),
        ]);
        $student = User::create([
            'name'      => 'siswa2',
            'email'     => 'siswa2@gmail.com',
            'password'  => Hash::make('siswa'),
        ]);
        $student->assignRole('student');
    }
}
