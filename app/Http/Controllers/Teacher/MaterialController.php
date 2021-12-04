<?php

namespace App\Http\Controllers\Teacher;

use App\GradeMajor;
use App\Http\Controllers\Controller;
use App\Material;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::where('user_id', '=', auth()->user()->id)->first();
        $gradeMajors = GradeMajor::join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->select('majors.name as major_name', 'grades.name as grade_name', 'grade_majors.id as gm_id', 'grade_majors.group')
            ->get();
        $subject = Subject::where('id', $teacher->subject_id)->get();
        $material = Material::join('grade_majors', 'grade_majors.id', '=', 'materials.grade_major_id')
            ->join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->join('subjects', 'subjects.id', '=', 'materials.subject_id')
            ->where('subjects.id', $teacher->subject_id)
            ->select('materials.*', 'grades.name as grade_name', 'majors.name as major_name', 'subjects.name as subject_name')
            ->get();
        return view('teacher.manage-material.index', compact('gradeMajors', 'subject', 'material'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = Teacher::where('user_id', '=', auth()->user()->id)->first();
        $gradeMajors = GradeMajor::join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->select('majors.name as major_name', 'grades.name as grade_name', 'grade_majors.id as gm_id', 'grade_majors.group')
            ->get();
        $materi = Subject::where('id', $teacher->subject_id)->first();
        return view('teacher.manage-material.create', compact('gradeMajors', 'materi'));
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
            'title.required' => 'Judul materi wajib di isi',
            'grade_major_id.required' => 'Kelas dan jurusan wajib di isi',
            'description.required' => 'Deskripsi wajib di isi',
            'file.required' => 'File wajib di isi',

            // mimes
            'file.mimes' => 'Format file salah, extension file harus .pdf'
        ];
        $validate = Validator::make($request->all(), [
            'title'             => 'required',
            'subject_id'        => 'required',
            'grade_major_id'    => 'required',
            'description'       => 'required',
            'file'              => 'required|mimes:pdf',
        ], $message);

        // if validate fails return redirect to edit page with message
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        $material = new Material();
        $material->title = $request->title;
        $material->subject_id = $request->subject_id;
        $material->grade_major_id = $request->grade_major_id;
        $material->description = $request->description;
        if ($request->hasFile('file')) {
            $fileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileEx = $request->file->getClientOriginalExtension();
            $fileGroup = $fileName . '-' . time() . '.' . $fileEx;
            $fileMove = $request->file->move('file', $fileGroup);
            $material->file = $fileGroup;
        }
        $material->save();
        return redirect()->route('manage-material')->with('success', 'Data berhasil di tambahkan');
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
        $teacher = Teacher::where('user_id', '=', auth()->user()->id)->first();
        $gradeMajors = GradeMajor::join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->select('majors.name as major_name', 'grades.name as grade_name', 'grade_majors.id as gm_id', 'grade_majors.group')
            ->get();
        $findMateri = Subject::where('id', $teacher->subject_id)->first();
        $material = Material::findOrFail($id);
        return view('teacher.manage-material.edit', compact('material', 'gradeMajors', 'findMateri'));
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
        // dd($request->all());
        $material = Material::find($id);
        $material->title = $request->title;
        $material->subject_id = $request->subject_id;
        $material->grade_major_id = $request->grade_major_id;
        $material->description = $request->description;
        if ($request->hasFile('file')) {
            $fileName = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileEx = $request->file->getClientOriginalExtension();
            $fileGroup = $fileName . '-' . time() . '.' . $fileEx;
            $fileMove = $request->file->move('file', $fileGroup);
            $material->file = $fileGroup;
        }
        $material->update();
        return redirect()->route('manage-material')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = Material::findOrFail($id);
        $materi->delete();
        return redirect()->back()->with('success', 'Data berhasil di hapus');
    }
}
