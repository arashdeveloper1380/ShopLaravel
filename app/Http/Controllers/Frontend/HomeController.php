<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Category;
use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Setting;
use App\Social;
use Illuminate\Contracts\Session\Session;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function en()
    {
        session()->get('lang');
        session()->forget('lang');
        session()->put('lang','en');

        return redirect()->back();
    }
    
    public function fa()
    {
        session()->get('lang');
        session()->forget('lang');
        session()->put('lang','fa');
        
        return redirect()->back();
    }

    public function index()
    {
        $Social = Social::where('status',1)->get();
        $Category = Category::all();
        $New_Product = Product::orderBy('id','DESC')->where(['status'=>1])->get();
        $Special_Product = Product::orderBy('id','DESC')->where(['special'=>1])->where(['status'=>1])->get();
        $Brand = Brand::orderBy('id','DESC')->where(['status'=>1])->get();
        $Setting = Setting::first();
        $Product_cat = Product::orderBy('id','DESC')->where(['status'=>1])->with('category')->get();
        



        return view('frontend.index',compact(
            'Social',
            'Category',
            'New_Product',
            'Special_Product',
            'Brand',
            'Setting',
            'Product_cat'
        ));
    }

    public function show($id,$product_name){
        $Feature = Feature::orderBy('id','DESC')->where('product_id',$id)->where('status',1)->with('product')->get();
        $Category = Category::all();
        $Setting = Setting::first();
        $Social = Social::where('status',1)->get();
        $Single =  Product::with('brand')->where(['id'=>$id])->firstOrFail();
        $LikeProduct = Product::with('category')->where('id',$id)->firstOrFail();
        $L_product = Product::orderBy('id','DESC')->with('category')->where('id','!=',$id)->where('category_id',$LikeProduct->category_id)->get();
        $NewProduct = Product::orderBy('id','DESC')->where(['status'=>1])->limit(10)->get();
        $Specialpro = Product::orderBy('id','DESC')->where(['status'=>1])->where(['special'=>1])->limit(10)->get();
        return view('frontend.single-product',compact(
        'Category','Single','LikeProduct',
        'L_product','NewProduct','Specialpro',
        'Social','Setting','Feature'
    ));
    }


    public function category($id)
    {
        $Social = Social::where('status',1)->get();
        $Category = Category::where('status',1)->get();
        $Brand = Brand::where('status',1)->get();
        $ProductCategory = DB::table('products')
        ->join('category','products.category_id','category.id')
        ->select('products.*','category.category_fa','category.category_en')
        ->where('category_id',$id)
        ->first();
        $Setting = Setting::first();

        $ProductCatnew = Product::orderBy('id','DESC')->where('status',1)->where('category_id',$id)->with('category')->paginate(9);
        $ProductMax = Product::orderBy('price','DESC')->where('status',1)->where('category_id',$id)->with('category')->paginate(9);
        $ProductMin = Product::orderBy('price','ASC')->where('status',1)->where('category_id',$id)->with('category')->paginate(9);
        $ProductRandorm = Product::inRandomOrder()->where('status',1)->where('category_id',$id)->with('category')->paginate(9);

        $NewProduct = Product::orderBy('id','DESC')->where(['status'=>1])->limit(10)->get();
        $Specialpro = Product::orderBy('id','DESC')->where(['status'=>1])->where(['special'=>1])->limit(10)->get();

        return view('frontend.category',compact(
            'Category','ProductCategory','ProductCatnew',
            'ProductMax','ProductMin','ProductRandorm',
            'NewProduct','Specialpro','Brand','Social','Setting'
        ));
    }


    public function brand($id,$name)
    {
        $Social = Social::where('status',1)->get();
        $Brand = Brand::where('status',1)->get();
        $Category = Category::where('status',1)->get();
        $Setting = Setting::first();
        $ProductBrand = DB::table('products')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','brands.brand_fa','brands.brand_en')
        ->where('brand_id',$id)->first();

        $ProductBrands = Product::orderBy('id','DESC')->where(['status'=>1])->where('brand_id',$id)->with('brand')->paginate(9);
        $ProductBrandMax = Product::orderBy('price','DESC')->where(['status'=>1])->where('brand_id',$id)->with('brand')->paginate(9);
        $ProductBrandMin = Product::orderBy('price','ASC')->where(['status'=>1])->where('brand_id',$id)->with('brand')->paginate(9);
        $ProductBrandRandom = Product::orderBy('price','DESC')->inRandomOrder()->where(['status'=>1])->where('brand_id',$id)->with('brand')->paginate(9);

        $NewProduct = Product::orderBy('id','DESC')->where(['status'=>1])->limit(10)->get();
        $Specialpro = Product::orderBy('id','DESC')->where(['status'=>1])->where(['special'=>1])->limit(10)->get();

        return view('frontend.brandProduct',compact(
            'Brand','Category','ProductBrand',
            'ProductBrands','ProductBrandMax',
            'ProductBrandMin','ProductBrandRandom',
            'NewProduct','Specialpro','Social','Setting'
        ));
    }
    
    public function special()
    {
        $Brand = Brand::where('status',1)->get();
        $Category = Category::where('status',1)->get();
        $Social = Social::where('status',1)->get();
        $ProductBrands = Product::orderBy('id','DESC')->where(['status'=>1])->where(['special'=>1])->paginate(9);
        $ProductBrandMax = Product::orderBy('price','DESC')->where(['status'=>1])->where(['special'=>1])->paginate(9);
        $ProductBrandMin = Product::orderBy('price','ASC')->where(['status'=>1])->where(['special'=>1])->paginate(9);
        $ProductBrandRandom = Product::orderBy('price','DESC')->inRandomOrder()->where(['special'=>1])->where(['status'=>1])->paginate(9);
        $Setting = Setting::first();
        $NewProduct = Product::orderBy('id','DESC')->where(['status'=>1])->limit(10)->get();
        $Specialpro = Product::orderBy('id','DESC')->where(['status'=>1])->where(['special'=>1])->limit(10)->get();

        return view('frontend.special',compact(
            'Brand','Category',
            'ProductBrands','ProductBrandMax',
            'ProductBrandMin','ProductBrandRandom',
            'NewProduct','Specialpro','Social','Setting'
        ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.index');
    }

}
