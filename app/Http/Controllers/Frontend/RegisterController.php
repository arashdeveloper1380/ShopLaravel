<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $User = new User($request->all());
        $User->password = Hash::make($request->password);
        $User->role = 'user';
        $User->saveOrFail();

        return redirect()->route('login');
    }
}
