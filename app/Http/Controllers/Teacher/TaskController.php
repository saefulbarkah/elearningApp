<?php

namespace App\Http\Controllers\Teacher;

use App\GradeMajor;
use App\Http\Controllers\Controller;
use App\Subject;
use App\Task;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getIdSubject = Teacher::where('user_id', '=', auth()->user()->id)->first();
        $data = Task::join('subjects', 'subjects.id', '=', 'tasks.subject_id')
            ->join('grade_majors', 'grade_majors.id', '=', 'tasks.grade_major_id')
            ->join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->select(
                'tasks.title',
                'tasks.description',
                'tasks.file',
                'majors.name as major_name',
                'grades.name as grade_name',
                'subjects.name as subject_name',
                'tasks.start_time',
                'tasks.end_time',
            )->where('tasks.subject_id', '=', $getIdSubject->subject_id)->get();
        return view('teacher.manage-task.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gradeMajors = GradeMajor::join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->select('majors.name as major_name', 'grades.name as grade_name', 'grade_majors.id as gm_id', 'grade_majors.group')
            ->get();
        $teacher = Teacher::where('user_id', '=', auth()->user()->id)->first();
        $subject = Subject::where('id', $teacher->subject_id)->first();
        return view('teacher.manage-task.create-task', compact('gradeMajors', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $message = [

            // required
            'title.required' => "Kolom judul tidak boleh kosong",
            'start_time.required' => "Kolom tanggal tidak boleh kosong",
            'end_time.required' => "Kolom tanggal tidak boleh kosong",
            'description.required' => "Kolom deskripsi tidak boleh kosong",

            'title.max' => "Jumlah karakter terlalu banyak",
            'grade_major_id.required' => 'Kelas dan jurusan wajib di isi',
            'description.required' => 'Deskripsi wajib di isi',
            'file.required' => 'File wajib di isi',

            // mimes
            'file.mimes' => 'Format file salah',


            // date
            'start_time.date' => "Harus menggunakan format tanggal",
            'start_time.after_or_equal' => "Waktu tidak valid",
            'end_time.after' => "Waktu tidak valid",
        ];

        $validate = Validator::make($request->all(), [
            'title'           => 'required|max:255',
            'start_time'    => 'required|date|after_or_equal:' . Carbon::now()->format('Y-m-d'),
            'end_time'    => 'required|after:start_time',
            'description'    => 'required',
            'subject_id'        => 'required',
            'grade_major_id'    => 'required',
            'file'              => 'mimes:pdf,jpg,png,jpeg',

        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        $post = new Task();
        $post->title = $request->title;
        $post->subject_id = $request->subject_id;
        $post->grade_major_id = $request->grade_major_id;
        $post->start_time = Carbon::parse($request->start_time)->format('Y-m-d');
        $post->end_time = Carbon::parse($request->end_time)->format('Y-m-d');
        $post->description = $request->description;
        if ($request->hasFile('file')) {
            $fileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileEx = $request->file->getClientOriginalExtension();
            $fileGroup = $fileName . '-' . time() . '.' . $fileEx;
            $fileMove = $request->file->move('file', $fileGroup);
            $post->file = $fileGroup;
        }
        $post->save();
        return redirect()->route('manage-task')->with('success', 'Data berhasil di tambahkan');
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
