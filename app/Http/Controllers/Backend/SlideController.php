<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Slider = Slider::orderBy('id','DESC')->paginate(5);
        return view('backend.slider.index',compact('Slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Slider = new Slider($request->all());

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/slider',$file_name)){
                $Slider->image = $file_name;
            }
        }

        $Slider->saveOrFail();

        return redirect()->route('slider.index')->with('msg','اسلایدر با موفقیت ثبت شد');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slider = Slider::findOrFail($id);
        $img = $Slider->image;
        $Slider->delete();
        if(!empty($img)){
            unlink('upload/slider/'.$img);
        }

        return redirect()->route('slider.index')->with('deletemsg','اسلایدر با موفقیت حذف شد');
    }
}
