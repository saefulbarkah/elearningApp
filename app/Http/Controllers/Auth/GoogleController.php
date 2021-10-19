<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function authGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        $user = Socialite::driver('google')->user();
        $find_user = User::where('google_id',$user->getId())->first();
        if($find_user){
            Auth::login($find_user);
            return redirect('dashboard');
        }else{
            $newUser = User::create([
                'name'      => $user->name,
                'email'     => $user->email,
                'google_id' => $user->id,
                'password'  => bcrypt('12345678'),
            ]);
            $newUser->assignRole('student');
            Auth::login($newUser);
            return redirect('dashboard');
            
    }
}
