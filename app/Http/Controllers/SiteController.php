<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\StandardColor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Cookie;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;


class SiteController extends Controller
{

    public function getCart()
    {
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice')->get();
        return $carts;
    }
    public function index()
    {
        $setting = Setting::first();
        // Seo
        SEOTools::setTitle('Home');
        SEOTools::setDescription($setting->description);
        SEOTools::opengraph()->setUrl('httpd://portafoto.net/en');
        SEOTools::setCanonical('https://portafoto.net/en');
        SEOTools::opengraph()->addProperty('type', 'ecommerce');
        SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage("https://portafoto.net/site/assets/images/logo/logo.jpg");
        OpenGraph::addImage("https://portafoto.net/site/assets/images/logo/logo.jpg");

        // End Seo

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
        $product = Product::where('slug', $slug)->first();
        $setting = Setting::first();
        $descriptionSeo = '';
        if ($product->description != null) {
            $descriptionSeo .=  __("site.decProduct") . $product->description;
        } else {
            $descriptionSeo .=  __("site.decProduct");
        }

        $descriptionSeo = strip_tags($descriptionSeo);

        SEOMeta::setTitle($product->name);
        SEOMeta::setDescription($descriptionSeo);
        SEOMeta::addMeta('product:published_time', $product->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('product:section', $product->category, 'property');
        SEOMeta::addKeyword([$setting->keywords]);

        OpenGraph::setDescription($descriptionSeo);
        OpenGraph::setTitle($product->name);
        OpenGraph::setUrl(route('showProduct', $product->slug));
        OpenGraph::addProperty('type', 'ecommerce');
        OpenGraph::addProperty('locale', 'en');
        OpenGraph::addProperty('locale:alternate', ['ar', 'en']);


        OpenGraph::addImage($product->getFirstMediaUrl('products'));
        foreach ($product->getMedia('products') as $productImage) {
            OpenGraph::addImage($product->getFirstMediaUrl('products'));
        }
        OpenGraph::addImage(['url' => $product->getFirstMediaUrl('products'), 'size' => 300]);
        OpenGraph::addImage($product->getFirstMediaUrl('products'), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($product->name);
        JsonLd::setDescription($descriptionSeo);
        JsonLd::setType('Product');

        $productsLike = $product->category->product()->where('id', '!=', $product->id)->limit(3)->get();
        $colors = StandardColor::get();

        $carts = $this->getCart();

        return view('site.product', compact('product', 'colors', 'carts', 'setting', 'productsLike'));
    }


    public function favoriteProductMobile()
    {
        $setting = Setting::first();
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice')->get();

        $favorites = Cookie::get('favorites');

        $favorites = json_decode($favorites, true);

        $products = Product::whereIn('id', $favorites)->with('media')->get();

        // return response()->json(['message' => 'Product added to favorites', 'favorites' => $favorites]);



        return view('site.mobile-fav', compact('setting', 'carts', 'products'));
    }

    public function removeFromCookiesMobile(Request $request, $id)
    {
        $existingFavorites = json_decode($request->cookie('favorites'), true);

        // Remove the product ID from the favorites array
        $updatedFavorites = array_diff($existingFavorites, [$id]);

        // Update the favorites cookie with the new array of IDs
        $cookie = cookie('favorites', json_encode($updatedFavorites), 60);

        return redirect()->back() ->with('success', __('site.messages_addToCart'))->cookie($cookie);
    }


    public function cartMobile()
    {
        $setting = Setting::first();
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice')->get();

        return view('site.mobile-fav', compact('setting', 'carts'));
    }

    public function search(Request $request)
    {
        $setting = Setting::first();
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice')->get();
        $query = $request->input('search');

        $products = Product::where(function ($q) use ($query) {
            $q->where('name->en', 'like', '%' . $query . '%')
                ->orWhere('name->ar', 'like', '%' . $query . '%');
        })->get();

        return view('site.search_results', [
            'products' => $products,
            'carts' => $carts,
            'setting' => $setting,
        ]);
    }
}
