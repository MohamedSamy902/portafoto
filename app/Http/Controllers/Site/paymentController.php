<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Models\City;
use App\Models\Invoice;
use App\Models\Setting;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\Payment\StorePaymentRquest;


class paymentController extends Controller
{

    public function getCart()
    {
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice')->get();
        return $carts;
    }


    public function buyNow($id)
    {

        // $customerId = Cookie::get('customerId');
        // $carts = Cart::where('customerId', $customerId)->where('status', 'outInvoice')->get();
        // return $carts;
    }



    public function showPayment()
    {
        $setting = Setting::first();
        $carts = $this->getCart();
        $customerId = Cookie::get('customerId');
        $totalPrice =  Cart::where('customerId', $customerId)->sum('totalPrice');

        $governorates = Governorate::where('status', 'active')->get();
        if (COUNT($carts) == 0) {
            return redirect()->back()
                ->with('success', __('master.messages_edit'));
        }
        return view('site.payment', compact('carts', 'totalPrice', 'governorates', 'setting'));
    }


    public function getCities($id)
    {
        $data = City::where("governorate_id", $id)
            ->get(["name", "id"]);
        return response()->json($data);
    }

    public function storePayment(StorePaymentRquest $request)
    {
        $customerId = Cookie::get('customerId');
        $totalPrice = $totalPrice =  Cart::where('customerId', $customerId)->sum('totalPrice');

        $totalPrice += Governorate::where('id', $request->governorate_id)->first()->price;
        $carts =  Cart::where('customerId', $customerId)->get();

        $invoice = Invoice::create([
            'name' => $request->name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'email' => $request->email,
            'zip_code' => $request->zip_code,
            'totalPrice' => $totalPrice,
            'governorate_id' => $request->governorate_id,
            'city_id' => $request->city_id,
            'customerId' => $customerId,
        ]);
        $id =  $invoice->id;
        foreach ($carts as $cart) {
            $cart->update([
                'invoice_id' => $id,
                'status' => 'inInvoice',
            ]);
        }

        return redirect()->back()
            ->with('success', __('master.save'));

        if ($request->paymet == 'vodafon') {
        }

        if ($request->paymet == 'instaPay') {
        }

        if ($request->paymet == 'cash') {
        }

        return redirect()->back()
            ->with('success', __('site.messages_soreOrder'));
    }
}
