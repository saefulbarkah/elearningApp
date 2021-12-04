<?php

namespace App\Http\Controllers\Teacher;

use App\GradeMajor;
use App\Http\Controllers\Controller;
use App\Material;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

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
            ->where('grade_majors.id', $teacher->grade_major_id)
            ->select('majors.name as major_name', 'grades.name as grade_name', 'grade_majors.id as gm_id', 'grade_majors.group')
            ->get();
        $subject = Subject::where('id', $teacher->subject_id)->get();
        $material = Material::join('grade_majors', 'grade_majors.id', '=', 'materials.grade_major_id')
            ->join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->join('subjects', 'subjects.id', '=', 'materials.subject_id')
            ->where('grade_major_id', $teacher->grade_major_id)
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
        // dd($request->all());
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
        return response()->json(['success' => 'Got Simple Ajax Request.']);
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
