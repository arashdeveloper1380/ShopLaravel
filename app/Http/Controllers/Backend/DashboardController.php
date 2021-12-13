<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return view('backend.dashboard.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.index');
    }

}
