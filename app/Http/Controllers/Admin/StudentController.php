<?php

namespace App\Http\Controllers\Admin;

use App\GradeMajor;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::join('users', 'users.id', '=', 'students.user_id')
            ->join('grade_majors', 'grade_majors.id', '=', 'students.grade_major_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->select('users.name', 'students.*', 'majors.name as major_name', 'grades.name as grade_name')
            ->get();
        // return $student;
        return view('admin.manage-student.index', compact('student'));
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
            ->select('majors.name as major_name', 'grades.name as grade_name', 'grade_majors.id as gm_id')
            ->get();
        // dd($gradeMajors);
        return view('admin.manage-student.create', compact('gradeMajors'));
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
            'nis.required' => "Kolom nis tidak boleh kosong",
            'name.required' => "Kolom nama tidak boleh kosong",
            'email.required' => "Kolom email tidak boleh kosong",
            'gender.required' => "Jenis kelamin wajib di pilih",
            'grade_major_id.required' => "Kelas dan jurusan wajib di pilih",
            'address.required' => "Kolom alamat tidak boleh kosong",
            'religion.required' => "Agama wajib di pilih",

            // unique
            'email.unique'   => "Email sudah di gunakan",
            'nis.unique'   => "NIS sudah di gunakan",

            // mimes
            'image.mimes'   => 'Gambar wajib menggunakan format png dan jpg'
        ];
        $validate = Validator::make($request->all(), [
            'name'           => 'required',
            'email'          => 'required|unique:users,email',
            'nis'            => 'required|unique:students,nis',
            'grade_major_id' => 'required',
            'gender'         => 'required',
            'religion'  => 'required',
            'address'        => 'required',
            'image'          => 'mimes:jpg,png'
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }
        // dd($request->all());
        // new User
        $newUserStudent = new User();
        $newUserStudent->name = $request->name;
        $newUserStudent->email = $request->email;
        $newUserStudent->password = Hash::make('rahasia1234');
        $newUserStudent->save();

        // new Student
        $student = new Student();
        $student->user_id           = $newUserStudent->id;
        $student->nis               = $request->nis;
        $student->grade_major_id    = $request->grade_major_id;
        $student->gender            = $request->gender;
        $student->religion     = $request->religion;
        $student->address           = $request->address;
        if ($request->hasFile('image')) {
            $imageName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $imageEx   = $request->image->getClientOriginalExtension();
            $imageGroup = $imageName . '-' . time() . '.' . $imageEx;
            $imageMove = $request->image->move('images', $imageGroup);
            $student->image = $imageGroup;
        }
        if ($request->image == NULL) {
            if ($request->input('gender') == 'L') {
                $student->image = 'student-l.png';
            }
            if ($request->input('gender') == 'P') {
                $student->image = 'student-p.png';
            }
        }
        // dd($student);
        $student->save();
        return redirect()->route('manage-student')->with('success', 'Data berhasil di tambahkan');
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
        $student = Student::join('users', 'users.id', '=', 'students.user_id')
            ->select('users.name as user_name', 'users.email as user_email', 'students.*')
            ->find($id);

        // dd($student);
        $gradeMajors = GradeMajor::join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->select('majors.name as major_name', 'grades.name as grade_name', 'grade_majors.id as gm_id')
            ->get();
        return view('admin.manage-student.edit', compact('gradeMajors', 'student'));
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

        $message = [
            // required
            'nis.required' => "Kolom nis tidak boleh kosong",
            'name.required' => "Kolom nama tidak boleh kosong",
            'email.required' => "Kolom email tidak boleh kosong",
            'gender.required' => "Jenis kelamin wajib di pilih",
            'grade_major_id.required' => "Kelas dan jurusan wajib di pilih",
            'address.required' => "Kolom alamat tidak boleh kosong",
            'religion.required' => "Agama wajib di pilih",

            // unique
            'email.unique'   => "Email sudah di gunakan",
            'nis.unique'   => "NIS sudah di gunakan",

            // mimes
            'image.mimes'   => 'Gambar wajib menggunakan format png dan jpg'
        ];
        $validate = Validator::make($request->all(), [
            'name'           => 'required',
            'email'          => 'required|unique:users,email,' . $request->user_id,
            'nis'            => 'required|unique:students,nis,' . $id,
            'grade_major_id' => 'required',
            'gender'         => 'required',
            'religion'  => 'required',
            'address'        => 'required',
            'image'          => 'mimes:jpg,png'
        ], $message);

        // if validate fails return redirect to edit page with message
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }

        // new Student
        $student = Student::find($id);
        $student->user_id           = $request->user_id;
        $student->nis               = $request->nis;
        $student->grade_major_id    = $request->grade_major_id;
        $student->gender            = $request->gender;
        $student->religion     = $request->religion;
        $student->address           = $request->address;
        if ($request->hasFile('image')) {
            $imageName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $imageEx   = $request->image->getClientOriginalExtension();
            $imageGroup = $imageName . '-' . time() . '.' . $imageEx;
            $imageMove = $request->image->move('images', $imageGroup);
            $student->image = $imageGroup;
        }
        // dd($student->image);
        if ($student->image == 'student-l.png' or $student->image == 'student-p.png') {
            if ($request->input('gender') == 'L') {
                $student->image = 'student-l.png';
            }
            if ($request->input('gender') == 'P') {
                $student->image = 'student-p.png';
            }
        }
        $student->save();

        // Update User
        $newUserStudent = User::find($student->user_id);
        $newUserStudent->name = $request->name;
        $newUserStudent->email = $request->email;
        $newUserStudent->save();
        return redirect()->route('manage-student')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student  = Student::find($id);
        $findUser = User::where('id', $student->user_id)->first();
        $findUser->delete();
        $student->delete();
        return redirect('admin/manage-student')->with('success', 'Data berhasil di hapus');
    }
}
