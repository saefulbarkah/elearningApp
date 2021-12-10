<?php

namespace App\Http\Controllers\Student;

use App\Task;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use TaskSeeder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::where('user_id', '=', auth()->user()->id)->first();
        // $data = Task::join('subjects', 'subjects.id', '=', 'tasks.subject_id')
        //     ->join('grade_majors', 'grade_majors.id', '=', 'tasks.grade_major_id')
        //     ->join('grades', 'grades.id', '=', 'grade_majors.grade_id')
        //     ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
        //     ->select(
        //         'tasks.title',
        //         'tasks.description',
        //         'tasks.file',
        //         'majors.name as major_name',
        //         'grades.name as grade_name',
        //         'subjects.name as subject_name',
        //         'tasks.start_time',
        //         'tasks.end_time',
        //     )->get();
        $data = Task::where('grade_major_id', '=', $student->grade_major_id)->get();
        return view('student.list-task.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
