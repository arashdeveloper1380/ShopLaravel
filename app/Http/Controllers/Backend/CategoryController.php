<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::orderBy('id','DESC')->paginate(5);
        return view('backend.category.index',compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $Category = new Category($request->all());
        $Category->slug = Str::slug($request->category_en);

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/category',$file_name)){
                $Category->image = $file_name;
            }
        }

        $Category->saveOrFail();

        return redirect()->route('category.index')->with('msg','دسته بندی با موفقیت ثبت شد');
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
        $Category = Category::findOrFail($id);
        return view('backend.category.edit',compact('Category'));
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
        $Category = Category::findOrFail($id);
        $Category->slug = Str::slug($request->category_en);

        if($request->hasFile('image')){
            $file_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($request->file('image')->move('upload/category',$file_name)){
                $Category->image = $file_name;
            }
        }

        $Category->update($request->all());

        return redirect()->route('category.index')->with('updatemsg','دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::findOrFail($id);
        $img = $Category->image;
        $Category->delete();
        if(!empty($img)){
            unlink('upload/category/'.$img);
        }
        $Category->delete();

        return redirect()->route('category.index')->with('deletemsg','دسته بندی با موفقیت حذف شد');
    }
}
