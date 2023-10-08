<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StandardColor;
use Illuminate\Support\Facades\Cookie;

class SiteController extends Controller
{
    public function index(){

        $products = Product::where('status', '!=', 'inactive')->get();
        $productsBest =  Product::where('status', '!=', 'inactive')->where('best', 'yes')->limit(4)->get();
        // return $productsBest;
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->get();
        return view('site.index', compact('products', 'carts', 'productsBest'));
    }

    public function showProduct($slug) {

        $product = Product::where('slug', $slug)->first();
        $colors = StandardColor::get();

        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->get();

        return view('site.product', compact('product', 'colors', 'carts'));
    }
}
