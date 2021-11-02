<?php

namespace App\Http\Controllers\Admin;

use App\Day;
use App\GradeMajor;
use App\Http\Controllers\Controller;
use App\ScheduleSubject;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = ScheduleSubject::join('days', 'days.id', '=', 'day_id')
                                    ->join('subjects', 'subjects.id', '=', 'subject_id')
                                    ->join('grade_majors', 'grade_majors.id', '=', 'grade_major_id')
                                    ->select('days.name as d_name', 'subjects.name as sbj_name', 'start_time', 'end_time', 'schedule_subjects.id as id')
                                    ->get();
        // dd($schedule);

        return view('admin.manage-schedule.index', compact('schedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $day = Day::get();
        $subject = Subject::orderBy('name', 'asc')->get();
        $teacher = Teacher::join('users','users.id','=','user_id')
                            ->select('teachers.*','users.name as name')
                            ->orderBy('name','ASC')
                            ->get();
        $grade_major = GradeMajor::join('grades', 'grades.id', '=', 'grade_id')
                                ->join('majors', 'majors.id', '=', 'major_id')
                                ->select('grades.name as gr_name', 'majors.name as mj_name', 'grade_majors.*')
                                ->get();
        // dd($grade_major);

        return view('admin.manage-schedule.create', compact('day', 'subject', 'grade_major','teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate

        $message = [

            // required
            'day_id.required' => "Kolom hari tidak boleh kosong",
            'subject_id.required' => "Kolom mata pelajaran tidak boleh kosong",
            'grade_major_id.required' => "Kolom kelas dan jurusan tidak boleh kosong",
            'teacher_id.required' => "Kolom guru tidak boleh kosong",
            'start_time.required' => "Kolom jam wajib di pilih",
            'end_time.required' =>  "Kolom jam wajib di pilih"
        ];
        $validate = Validator::make($request->all(), [
            'day_id'           => 'required',
            'subject_id'          => 'required',
            'grade_major_id' => 'required',
            'teacher_id' => 'required',
            'start_time'         => 'required',
            'end_time'  => 'required',
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        $schedule = ScheduleSubject::where('day_id',$request->input('day_id'))->where('subject_id',$request->input('subject_id'))
                                  ->where('grade_major_id',$request->input('grade_major_id'))->where('teacher_id',$request->input('teacher_id'))
                                  ->first();
        if ($schedule) {
        return redirect()->back()->with('error', 'Data sudah tersedia')->withErrors($validate)->withInput();
        }

        $newSchedule = new ScheduleSubject();
        $newSchedule->day_id = $request->day_id;
        $newSchedule->subject_id = $request->subject_id;
        $newSchedule->grade_major_id = $request->grade_major_id;
        $newSchedule->teacher_id = $request->teacher_id;
        $newSchedule->start_time = $request->start_time;
        $newSchedule->end_time = $request->end_time;
        $newSchedule->save();

        return redirect()->route('manage-schedule')->with('success', 'Data berhasil di tambahkan');
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
        $day = Day::get();
        $subject = Subject::orderBy('name', 'asc')->get();
        $grade_major = GradeMajor::join('grades', 'grades.id', '=', 'grade_id')
                                    ->join('majors', 'majors.id', '=', 'major_id')
                                    ->select('grades.name as gr_name', 'majors.name as mj_name','grade_majors.id as grm_id','group')
                                    ->get();
        $teacher = Teacher::join('users','users.id','=','user_id')
                            ->select('teachers.id as t_id','users.*')
                            ->get();
                            // dd($teacher);
        // $teacher = ScheduleSubject::join('teachers','teachers.id','=','teacher_id')
        //                             ->join('users','users.id','=','teachers.user_id')
        //                             ->get();
        //                             dd($teacher);
        $schedule = ScheduleSubject::findOrFail($id);

        return view('admin.manage-schedule.edit', compact('day', 'subject', 'grade_major', 'schedule','teacher'));
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
         // validate

         $message = [

            // required
            'day_id.required' => "Kolom hari tidak boleh kosong",
            'subject_id.required' => "Kolom mata pelajaran tidak boleh kosong",
            'grade_major_id.required' => "Kolom kelas dan jurusan tidak boleh kosong",
            'teacher_id.required' => "Kolom guru tidak boleh kosong",
            'start_time.required' => "Kolom jam wajib di pilih",
            'end_time.required' =>  "Kolom jam wajib di pilih"
        ];
        $validate = Validator::make($request->all(), [
            'day_id'           => 'required',
            'subject_id'          => 'required',
            'grade_major_id' => 'required',
            'teacher_id' => 'required',
            'start_time'         => 'required',
            'end_time'  => 'required',
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        $schedule = ScheduleSubject::where('day_id',$request->input('day_id'))->where('subject_id',$request->input('subject_id'))
                                  ->where('grade_major_id',$request->input('grade_major_id'))->where('teacher_id',$request->input('teacher_id'))
                                  ->first();
        if ($schedule) {
        return redirect()->back()->with('error', 'Data sudah tersedia')->withErrors($validate)->withInput();
        }

        $newSchedule = ScheduleSubject::findOrFail($id);
        $newSchedule->day_id = $request->day_id;
        $newSchedule->subject_id = $request->subject_id;
        $newSchedule->grade_major_id = $request->grade_major_id;
        $newSchedule->teacher_id = $request->teacher_id;
        $newSchedule->start_time = $request->start_time;
        $newSchedule->end_time = $request->end_time;
        $newSchedule->save();

        return redirect()->route('manage-schedule')->with('success', 'Data berhasil di update');
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
