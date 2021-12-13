<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Brand = Brand::orderBy('id','DESC')->paginate(5);
        return view('backend.brand.index',['Brand'=>$Brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $Brand = new Brand($request->all());

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/brand',$file_name)){
                $Brand->image = $file_name;
            }
        }

        $Brand->saveOrFail();

        return redirect()->route('brand.index')->with('msg','برند با موفقیت ثبت شد');
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
        $Brand = Brand::findOrFail($id);
        return view('backend.brand.edit',['Brand'=>$Brand]);
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
        $Brand = Brand::findOrFail($id);

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/brand',$file_name)){
                $Brand->image = $file_name;
            }
        }

        $Brand->update($request->all());

        return redirect()->route('brand.index')->with('updatemsg','برند با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Brand = Brand::findOrFail($id);
        $img = $Brand->image;
        $Brand->delete();
        if(!empty($img)){
            unlink('upload/brand/'.$img);
        }

        return redirect()->route('brand.index')->with('deletemsg','برند با موفقیت حذف شد');
    }
}
