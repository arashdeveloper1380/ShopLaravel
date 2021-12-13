<?php

namespace App\Http\Controllers\Backend;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Coupon = Coupon::orderBy('id','DESC')->paginate(7);

        return view('backend.coupon.index',['Coupon'=>$Coupon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Coupon = new Coupon($request->all());
        $Coupon->saveOrFail();

        return redirect()->route('coupon.index')->with('msg','کد تخفیف با موفقیت ثبت شد');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();

        return redirect()->route('coupon.index')->with('deletemsg','کد تخفیف با موفقیت حذف شد');
    }
}
