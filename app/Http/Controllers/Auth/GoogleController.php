<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function authGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        $user = Socialite::driver('google')->user();

        $find_user = User::whereEmail($user->getEmail())->first();
        if ($find_user){
            Auth::login($find_user);

            if ($find_user->hasRole('admin')){
                return redirect ('admin');
            } elseif ($find_user->hasRole('teacher')){
                return redirect ('teacher');
            } elseif ($find_user->hasRole('student')){
                return redirect ('dashboard');
            } else {
                return redirect('asdf');
            }
        } else {
            return redirect('login');
        }


    }
}
