<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\StandardColor;
use Illuminate\Support\Facades\Cookie;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;


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

        SEOMeta::setTitle($product->name);
        SEOMeta::setDescription($product->description);
        SEOMeta::addMeta('product:published_time', $product->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('product:section', $product->category, 'property');
        SEOMeta::addKeyword([$setting->keywords]);

        OpenGraph::setDescription($product->description);
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
        JsonLd::setDescription($product->description);
        JsonLd::setType('Product');

        $productsLike = $product->category->product()->where('id', '!=', $product->id)->limit(3)->get();
        $colors = StandardColor::get();

        $carts = $this->getCart();

        return view('site.product', compact('product', 'colors', 'carts', 'setting', 'productsLike'));
    }




}
