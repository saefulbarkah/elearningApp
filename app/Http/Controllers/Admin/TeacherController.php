<?php

namespace App\Http\Controllers\Admin;

use App\GradeMajor;
use App\Http\Controllers\Controller;
use App\Subject;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->join('grade_majors', 'grade_majors.id', '=', 'teachers..grade_major_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('subjects', 'subjects.id', '=', 'teachers.subject_id')
            ->select('users.name', 'users.religion', 'users.gender', 'teachers.*', 'grades.name as grade_name', 'majors.name as major_name', 'grade_majors.id as gm_id', 'group', 'subjects.name as subject_name')
            ->get();
        return view('admin.manage-teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::all();
        $gradeMajor = GradeMajor::join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->select('grades.name as grade_name', 'majors.name as major_name', 'grade_majors.id as gm_id', 'group')
            ->get();
        return view('admin.manage-teacher.create', compact('subject', 'gradeMajor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [

            // required
            'nip.required' => "Kolom nip tidak boleh kosong",
            'name.required' => "Kolom nama tidak boleh kosong",
            'email.required' => "Kolom email tidak boleh kosong",
            'gender.required' => "Jenis kelamin wajib di pilih",
            'grade_major_id.required' => "Kelas dan jurusan wajib di pilih",
            'address.required' => "Kolom alamat tidak boleh kosong",
            'religion.required' => "Agama wajib di pilih",
            'subject_id.required' => "Bidang keahlian wajib di pilih",
            'grade_major_id.required' => "Kelas wajib di pilih",

            // unique
            'email.unique'   => "Email sudah di gunakan",
            'nip.unique'   => "NIP sudah di gunakan",

            // mimes
            'image.mimes'   => 'Gambar wajib menggunakan format png dan jpg'
        ];
        $validate = Validator::make($request->all(), [
            'name'           => 'required',
            'email'          => 'required|unique:users,email',
            'nip'            => 'required|unique:teachers,nip',
            'gender'         => 'required',
            'subject_id'         => 'required',
            'grade_major_id'         => 'required',
            'religion'       => 'required',
            'address'        => 'required',
            'image'          => 'mimes:jpg,png'
        ], $message);
        if ($validate->fails()) {
            return redirect()->back()->with('error', 'Data gagal di tambahkan')->withErrors($validate)->withInput();
        }
        // dd($request->all());
        // new User
        $newUserteacher = new User();
        $newUserteacher->name = $request->name;
        $newUserteacher->email = $request->email;
        $newUserteacher->password = Hash::make('rahasia1234');
        $newUserteacher->gender = $request->gender;
        $newUserteacher->religion = $request->religion;
        $newUserteacher->save();
        $newUserteacher->assignRole('teacher');


        // new Teacher
        $teacher = new Teacher();
        $teacher->user_id           = $newUserteacher->id;
        $teacher->nip               = $request->nip;
        $teacher->address           = $request->address;
        $teacher->subject_id        = $request->subject_id;
        $teacher->grade_major_id    = $request->grade_major_id;
        if ($request->hasFile('image')) {
            $imageName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $imageEx   = $request->image->getClientOriginalExtension();
            $imageGroup = $imageName . '-' . time() . '.' . $imageEx;
            $imageMove = $request->image->move('images', $imageGroup);
            $teacher->image = $imageGroup;
        }
        if ($request->image == NULL) {
            if ($request->input('gender') == 'L') {
                $teacher->image = 'student-l.png';
            }
            if ($request->input('gender') == 'P') {
                $teacher->image = 'student-p.png';
            }
        }
        // dd($teacher);
        $teacher->save();
        return redirect()->route('manage-teacher')->with('success', 'Data berhasil di tambahkan');
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
        $subject = Subject::all();
        $gradeMajor = GradeMajor::join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', '=', 'grade_majors.major_id')
            ->select('grades.name as grade_name', 'majors.name as major_name', 'grade_majors.id as gm_id', 'group')
            ->get();
        $teacher = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->select('users.name as user_name', 'users.email as user_email', 'users.religion', 'users.gender', 'teachers.*')
            ->find($id);
        return view('admin.manage-teacher.edit', compact('teacher', 'subject', 'gradeMajor'));
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
            'nip.required' => "Kolom nip tidak boleh kosong",
            'name.required' => "Kolom nama tidak boleh kosong",
            'email.required' => "Kolom email tidak boleh kosong",
            'gender.required' => "Jenis kelamin wajib di pilih",
            'address.required' => "Kolom alamat tidak boleh kosong",
            'religion.required' => "Agama wajib di pilih",

            // unique
            'email.unique'   => "Email sudah di gunakan",
            'nip.unique'   => "NIP sudah di gunakan",

            // mimes
            'image.mimes'   => 'Gambar wajib menggunakan format png dan jpg'
        ];
        $validate = Validator::make($request->all(), [
            'name'           => 'required',
            'email'          => 'required|unique:users,email,' . $request->user_id,
            'nip'            => 'required|unique:teachers,nip,' . $id,
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
        $teacher = Teacher::find($id);
        $teacher->user_id           = $request->user_id;
        $teacher->nip               = $request->nip;
        $teacher->address           = $request->address;
        $teacher->subject_id        = $request->subject_id;
        $teacher->grade_major_id    = $request->grade_major_id;
        if ($request->hasFile('image')) {
            $imageName = pathinfo($request->image->getClientOriginalName(), PATHINFO_FILENAME);
            $imageEx   = $request->image->getClientOriginalExtension();
            $imageGroup = $imageName . '-' . time() . '.' . $imageEx;
            $imageMove = $request->image->move('images', $imageGroup);
            $teacher->image = $imageGroup;
        }
        // dd($teacher->image);
        if ($teacher->image == 'student-l.png' or $teacher->image == 'student-p.png') {
            if ($request->input('gender') == 'L') {
                $teacher->image = 'student-l.png';
            }
            if ($request->input('gender') == 'P') {
                $teacher->image = 'student-p.png';
            }
        }
        $teacher->save();
        // Update User
        $newUserTeacher = User::find($teacher->user_id);
        $newUserTeacher->name = $request->name;
        $newUserTeacher->email = $request->email;
        $newUserTeacher->gender = $request->gender;
        $newUserTeacher->religion = $request->religion;
        $newUserTeacher->save();
        return redirect()->route('manage-teacher')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student  = Teacher::find($id);
        $findUser = User::where('id', $student->user_id)->first();
        $findUser->delete();
        $student->delete();
        return redirect()->route('manage-teacher')->with('success', 'Data berhasil di hapus');
    }
}
