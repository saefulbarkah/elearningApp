<?php

namespace App\Http\Controllers\Admin;

use App\Grade;
use App\GradeMajor;
use App\Http\Controllers\Controller;
use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = GradeMajor::join('grades','grades.id','=','grade_id')
                            ->join('majors','majors.id','=','major_id')
                            ->select('grade_majors.*','grades.name as gr_name','majors.name as mj_name')
                            ->get();
                            // dd($grade);

        return view('admin.manage-class.index',compact('grade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $grade = Grade::get();
       $major = Major::get();

        return view('admin.manage-class.create',compact('grade','major'));
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
            'grade_id.required' => "Kolom kelas tidak boleh kosong",
            'major_id.required' => "Kolom jurusan tidak boleh kosong",
            'group.required' => "Kolom grup tidak boleh kosong"
        ];
        $validate = Validator::make($request->all(), [
            'grade_id'           => 'required',
            'major_id'          => 'required',
            'group' => 'required',
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        $grade_major = GradeMajor::where('grade_id',$request->input('grade_id'))->where('major_id',$request->input('major_id'))
                        ->where('group',$request->input('group'))->first();
        if ($grade_major) {
            return redirect()->back()->with('error', 'Data sudah tersedia')->withErrors($validate)->withInput();
            }

        $newGradeMajor = new GradeMajor();
        $newGradeMajor->grade_id = $request->grade_id;
        $newGradeMajor->major_id = $request->major_id;
        $newGradeMajor->group = $request->group;
        $newGradeMajor->save();

        return redirect()->route('manage-class')->with('success', 'Data berhasil di tambahkan');
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
        $grade = Grade::get();
        $major = Major::get();
        $data = GradeMajor::findOrFail($id);

        return view('admin.manage-class.edit',compact('grade','data','major'));
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
            'grade_id.required' => "Kolom kelas tidak boleh kosong",
            'major_id.required' => "Kolom jurusan tidak boleh kosong",
            'group.required' => "Kolom grup tidak boleh kosong"
        ];
        $validate = Validator::make($request->all(), [
            'grade_id'           => 'required',
            'major_id'          => 'required',
            'group' => 'required',
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        $grade_major = GradeMajor::where('grade_id',$request->input('grade_id'))->where('major_id',$request->input('major_id'))
                        ->where('group',$request->input('group'))->first();
        if ($grade_major) {
            return redirect()->back()->with('error', 'Data sudah tersedia')->withErrors($validate)->withInput();
            }

        $newGradeMajor = GradeMajor::findOrFail($id);
        $newGradeMajor->grade_id = $request->grade_id;
        $newGradeMajor->major_id = $request->major_id;
        $newGradeMajor->group = $request->group;
        $newGradeMajor->save();

        return redirect()->route('manage-class')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = GradeMajor::findOrFail($id)->delete();

        return redirect()->route('manage-class')->with('success', 'Data berhasil di hapus');
    }
}
