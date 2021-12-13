<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use App\Category;
use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Product = Product::orderBy('id','DESC')->paginate(5);
        return view('backend.product.index',compact('Product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Category = Category::all();
        $Brand = Brand::all();
        return view('backend.product.create',compact('Category','Brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Product = new Product($request->all());
        
        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/product',$file_name)){
                $Product->image = $file_name;
            }
        }
        $Product->saveOrFail();

        return redirect()->route('product.index')->with('msg','محصول با موفقیت ثبت شد');
    }

    /**
     * 
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
        $Product = Product::findOrFail($id);
        
        $Category = Category::all();
        $Brand = Brand::all();

        return view('backend.product.edit',compact('Product','Category','Brand'));
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
        $Product = Product::findOrFail($id);
        
        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/product',$file_name)){
                $Product->image = $file_name;
            }
        }
        $Product->update($request->all());

        return redirect()->route('product.index')->with('updatemsg','محصول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::findOrFail($id);
        $img = $Product->image;
        $Product->delete();
        if(!empty($img)){
            unlink('upload/product/'.$img);
        }
        $Product->delete();

        return redirect()->route('product.index')->with('deletemsg','محصول با موفقیت حذف شد');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function feature(Request $request, $id)
    {
        $ProductSelected = Product::findOrFail($id);
        $Product = Product::all();
        $Feature = Feature::where('product_id',$id)->get();

        return view('backend.product.feature',compact('ProductSelected','Feature','Product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveFeature(Request $request)
    {
        $Feature = new Feature($request->all());
        $Feature->saveOrFail();

        return redirect()->route('features.index')->with('msg','ویژگی محصول با موفقیت ثبت شد');
    }
}
