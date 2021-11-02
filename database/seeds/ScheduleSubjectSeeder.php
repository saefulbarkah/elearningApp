<?php

use App\ScheduleSubject;
use Illuminate\Database\Seeder;

class ScheduleSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScheduleSubject::create([
            'day_id' => '1',
            'grade_major_id' => '1',
            'subject_id' => '1',
            'teacher_id' => '1',
            'start_time' => '08:00',
            'end_time' => '09:00'
        ]);

        ScheduleSubject::create([
            'day_id' => '2',
            'grade_major_id' => '3',
            'subject_id' => '3',
            'teacher_id' => '1',
            'start_time' => '09:00',
            'end_time' => '10:00'
        ]);

        ScheduleSubject::create([
            'day_id' => '3',
            'grade_major_id' => '5',
            'subject_id' => '5',
            'teacher_id' => '1',
            'start_time' => '10:00',
            'end_time' => '11:00'
        ]);
    }
}
