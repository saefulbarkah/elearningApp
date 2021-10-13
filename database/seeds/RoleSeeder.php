<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name'          => 'admin',
            'guard_name'    => 'web'
        ]);

        $teacher = Role::create([
            'name'          => 'teacher',
            'guard_name'    => 'web'
        ]);

        $student = Role::create([
            'name'          => 'student',
            'guard_name'    => 'web'
        ]);
    }
}
