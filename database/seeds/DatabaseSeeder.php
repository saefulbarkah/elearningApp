<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TeacherSeeder::class,
            DaySeeder::class,
            GradeSeeder::class,
            MajorSeeder::class,
            SubjectSeeder::class,
            GradeMajorSeeder::class,
            StudentSeeder::class,
            AnnouncementSeeder::class,
            MaterialSeeder::class,
        ]);
    }
}
