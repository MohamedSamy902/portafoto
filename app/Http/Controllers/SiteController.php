<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\StandardColor;
use Illuminate\Support\Facades\Cookie;

class SiteController extends Controller
{

    public function getCart(){
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice')->get();
        return $carts;
    }
    public function index()
    {
        $setting = Setting::first();
        // return $customerId;
        $products = Product::where('status', '!=', 'inactive')->with(['media', 'size'])->paginate(10);

        $productsBest =  Product::where('status', '!=', 'inactive')->where('best', 'yes')->limit(4)->with(['media', 'size'])->get();

        $productsSlider =  Product::where('status', '!=', 'inactive')->where('slider', 'yes')->limit(4)->with(['media', 'size'])->get();
        $carts = $this->getCart();
        // return $carts;
        return view('site.index', compact('products', 'carts', 'productsBest', 'productsSlider', 'setting'));
    }

    public function getProductsAjax(Request $request)
    {

        $products = Product::paginate(10)->get();
        return view('site.partialsProduct', ['products' => $products]);
    }


    public function showProduct($slug)
    {
        // $product->category->product()->where('id', '!=', $product->id)->limit(3)->get()
        $product = Product::where('slug', $slug)->first();
        $productsLike = $product->category->product()->where('id', '!=', $product->id)->limit(3)->get();
        $colors = StandardColor::get();

        $carts = $this->getCart();
        $setting = Setting::first();
        return view('site.product', compact('product', 'colors', 'carts', 'setting', 'productsLike'));
    }




}
