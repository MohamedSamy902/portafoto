<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Artesaos\SEOTools\Facades\SEOTools;



class OrderController extends Controller
{
    public function getCart()
    {
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice')->get();
        return $carts;
    }

    public function trackOrder()
    {
        $setting = Setting::first();
        $carts = $this->getCart();
        $customerId = Cookie::get('customerId');
        $orders = Invoice::where('customerId', $customerId)->where('status', '!=', 'Cancel OrderBy Customer')->get();
        SEOTools::setTitle('Order Track');
        SEOTools::setDescription($setting->description);
        SEOTools::opengraph()->setUrl('httpd://portafoto.net/en');
        SEOTools::setCanonical('https://portafoto.net/en');
        SEOTools::opengraph()->addProperty('type', 'ecommerce');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage("{{ asset('site') }}/assets/images/logo/logo.jpg");

        return view('site.order', compact('carts', 'orders', 'setting'));
    }



    public function cancelOrder($id)
    {
        $invoises = Invoice::findOrFail($id)->update(['status' => 'Cancel OrderBy Customer']);
        return redirect()->back()
            ->with('success', __('master.messages_success'));
    }
}
