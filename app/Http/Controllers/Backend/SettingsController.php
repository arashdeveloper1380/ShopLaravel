<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $Setting = Setting::first();
        return view('backend.settings.index',['Setting'=>$Setting]);
    }

    public function update(Request $request, $id)
    {
        $Setting = Setting::findOrFail($id);
        $Setting->update($request->all());

        return redirect()->route('setting.index');
    }
}
