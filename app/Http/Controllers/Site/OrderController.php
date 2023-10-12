<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;


class OrderController extends Controller
{
    public function getCart(){
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice') ->get();
        return $carts;
    }

    public function trackOrder()
    {
        $setting = Setting::first();
        $carts = $this->getCart();
        $customerId = Cookie::get('customerId');
        $orders = Invoice::where('customerId', $customerId)-> get();
        return view('site.order', compact('carts', 'orders', 'setting'));
    }



    public function cancelOrder($id)
    {
        $invoises = Invoice::findOrFail($id)->update(['status' => 'Cancel OrderBy Customer']);
        return redirect()->back()
            ->with('success', __('master.messages_success'));

    }

}
