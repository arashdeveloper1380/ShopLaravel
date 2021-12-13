<?php

namespace App\Http\Controllers\Backend;

use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Feature = Feature::orderBy('id','DESC')->paginate(10);
        return view('backend.feature.index',['Feature'=>$Feature]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Product = Product::select('id','title_fa')->get();
        return view('backend.feature.create',['Product'=>$Product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Feature = new Feature($request->all());
        $Feature->saveOrFail();

        return redirect()->route('features.index')->with('msg','ویژگی محصول با موفقیت ثبت شد');
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
        $Feature = Feature::findOrFail($id);
        $Product = Product::select('id','title_fa')->get();

        return view('backend.feature.edit',[
            'Feature'=>$Feature,
            'Product'=>$Product
        ]);
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
        $Feature = Feature::findOrFail($id);
        $Feature->update($request->all());

        return redirect()->route('features.index')->with('updatemsg','ویژگی محصول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feature::findOrFail($id)->delete();

        return redirect()->route('features.index')->with('deletemsg','ویژگی محصول با موفقیت ویرایش شد');
    }
}
