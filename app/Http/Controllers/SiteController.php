<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StandardColor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class SiteController extends Controller
{
    public function index()
    {

        $products = Product::where('status', '!=', 'inactive')->with(['media', 'size'])->paginate(10);

        // $products = Product::where('status', '!=', 'inactive')->paginate(10);
        $productsBest =  Product::where('status', '!=', 'inactive')->where('best', 'yes')->limit(4)->with(['media', 'size'])->get();
        // $productsBest = DB::table('products')
        //               ->select('*')
        //               ->where('status', '=', 'active')
        //               ->where('best', '=', 'yes')
        //               ->limit(4)
        //               ->get();
        $productsSlider =  Product::where('status', '!=', 'inactive')->where('slider', 'yes')->limit(4)->with(['media', 'size'])->get();
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->get();
        return view('site.index', compact('products', 'carts', 'productsBest', 'productsSlider'));
    }

    public function getProductsAjax(Request $request)
    {
        $products = Product::skip($request->input('skip'))->take(10)->with(['media', 'size'])->get();
        return view('site.partialsProduct', ['products' => $products])->render();
    }

    public function showProduct($slug)
    {

        $product = Product::where('slug', $slug)->first();
        $colors = StandardColor::get();

        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->get();

        return view('site.product', compact('product', 'colors', 'carts'));
    }
}
