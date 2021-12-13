<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Social;
use Cart;
use Validator;

class CartController extends Controller
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

        $discount = session()->get('coupon')['discount'];

        return view('frontend.cart')->with([
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
        $duplicated = Cart::instance('default')->search(function($cartItem,$rowId) use($request){
            return $cartItem->id === $request->id;
        });
        if ($duplicated->isNotEmpty()) {
            return redirect()->route('cart.index')->with('msg','محصول از قبل در سبد وجود دارد');
        }else {
          Cart::add($request->id, $request->title_fa, 1, $request->price)
          ->associate('App\Product'); // model
        return redirect()->route('cart.index')->with('msg','محصول با موفقیت به سبد اضافه شد');
        }
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

        $validator = Validator::make($request->all(),[
            'quantity'=>'required|numeric|between:1,9'
        ]);
    
          if ($validator->fails()) {
            session()->flash('error_message','تعداد محصول باید بین 1 تا 9 انتخاب شود خطا');
            return response()->json(['success'=>false]);
          }
    
          Cart::instance('default')->update($id,$request->quantity);
          session()->flash('success_message','تعداد بروزرسانی شد');
          return response()->json(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }

    public function empty()
    {
        Cart::destroy();

        return redirect()->back();
    }

    public function save($id)
    {
        $isExist = Cart::search(function($cartItem,$rowId) use($id){
            return $rowId === $id;
        });

        if($isExist->count()>0){
            $item = Cart::get($id);
            Cart::instance('save')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

            Cart::instance('default')->remove($id);

            return redirect()->route('cart.index')->with('msg','محصول با موفقیت به لیست علاقه مندی ها ذخیره شد');
        }
    }

    public function SaveDestroy($id)
    {
        Cart::instance('save')->remove($id);

        return redirect()->route('cart.index')->with('msg','محصول با موفقیت از لیست علاقه مندی ها حذف شد');
    }

    public function SaveEmpty()
    {
        Cart::instance('save')->destroy();

        return redirect()->route('cart.index')->with('msg','محصولات با موفقیت از لیست علاقه مندی ها حذف شدند');
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
