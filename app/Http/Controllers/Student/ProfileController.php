<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $student = Student::join('users', 'users.id', '=', 'students.user_id')
            ->join('grade_majors', 'grade_majors.id', '=', 'students.grade_major_id')
            ->join('grades', 'grades.id', '=', 'grade_majors.grade_id')
            ->join('majors', 'majors.id', 'grade_majors.major_id')
            ->select(
                'students.*',
                'users.name as user_name',
                'users.email as user_email',
                'grades.name as grade_name',
                'majors.name as major_name',

            )
            ->where('students.user_id', '=', auth()->user()->id)->first();
        return view('student.profile.index', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'password' => 'required|same:confirm|min:8',

        ], [
            'password.required' => 'Kata sandi wajib di isi',
            'password.same'     => 'Kata sandi harus sama',
            'password.min'      => 'Kata sandi minimal 8 karakter',
        ]);
        $user->update([
            'password' => Hash::make($request->old('password')),

        ]);
        return redirect()->back()->with('success', 'Profile berhasil di perbaharui');
    }
}
