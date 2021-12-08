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
            GradeSeeder::class,
            MajorSeeder::class,
            GradeMajorSeeder::class,
            SubjectSeeder::class,
            TeacherSeeder::class,
            DaySeeder::class,
            StudentSeeder::class,
            AnnouncementSeeder::class,
            MaterialSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
