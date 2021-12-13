<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Shipping;
use App\Social;
use Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::all();
        $Setting = Setting::first();
        $Social = Social::all();

        return view('frontend.checkout',compact('Category','Setting','Social'))->with([
            'Category'=>$Category,
            'Setting'=>$Setting,
            'Social'=>$Social,
            'discount'=>$this->getNumbers()->get('discount'),
            'newTotal'=>$this->getNumbers()->get('newTotal'),
            'newTax'=>$this->getNumbers()->get('newTax'),
            'newSubTotal'=>$this->getNumbers()->get('newSubTotal'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Shipping  = new Shipping($request->all());
        $Shipping->saveOrFail();

        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getNumbers()
    {
      $tax = config('cart.tax')/100 ;
      $discount = session()->get('coupon')['discount'] ??0;
      $newSubTotal = number_format((float)Cart::subtotal(),2)*1000000 - $discount;
      $newTax = $newSubTotal * $tax;
      $newTotal = $newSubTotal * (1+$tax);

      return collect([
        'tax'=>$tax,
        'discount'=>$discount,
        'newSubTotal' => $newSubTotal,
        'newTax' => $newTax,
        'newTotal'=>$newTotal
      ]);
    }
}
