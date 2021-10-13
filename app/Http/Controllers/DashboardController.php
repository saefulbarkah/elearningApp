<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
        $activityLog = Log::join('users', 'users.id', '=', 'logs.user_id')->orderBy('logs.id', 'DESC')->limit(10)->get();
        return view('dashboard', compact('activityLog'));
    }
}
