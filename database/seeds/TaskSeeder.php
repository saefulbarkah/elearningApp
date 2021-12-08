<?php

use App\Task;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tugas = Task::create([
            'title' => "pemograman dasar",
            'subject_id' => 1,
            'grade_major_id' => 2,
            'description' => 'kerjakan sekarang',
            'file'        => "pab.pdf",
            'start_time'        => Carbon::now()->format('Y-m-d'),
            'end_time'          => Carbon::now()->addMonth('2')->format('Y-m-d'),
        ]);
    }
}
