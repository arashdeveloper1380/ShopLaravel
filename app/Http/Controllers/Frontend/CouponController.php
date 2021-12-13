<?php

namespace App\Http\Controllers\Frontend;

use App\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class CouponController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = $request->code;
        $Coupon = Coupon::where('code',$code)->first();
        if($Coupon){
            session()->put('coupon',[
                'code'=>$Coupon->code,
                'discount'=>$Coupon->discount(Cart::subtotal()),
            ]);
            return redirect()->route('cart.index')->with('msgCode','کد تخفیف با موفقیت اعمال شد');
        }else{
            return redirect()->route('cart.index')->with('msgNotCode','چنین کد تخفیف موجود نیست یا وقتش تموم شده');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->route('cart.index')->with('msgNotCode','کد تخفیف با موفقیت پاک شد');
    }
}
