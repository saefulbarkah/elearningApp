<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $teacher = Teacher::join('users', 'users.id', '=', 'teachers.user_id')
            ->select(
                'teachers.*',
                'users.name as user_name',
                'users.email as user_email',

            )
            ->where('teachers.user_id', '=', auth()->user()->id)->first();
        return view('teacher.profile.index', compact('teacher'));
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
