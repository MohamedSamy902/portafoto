<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Support\Facades\Cookie;


class paymentController extends Controller
{
    public function showPayment()
    {
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->get();
        $totalPrice =  Cart::where('customerId', $customerId)->sum('totalPrice');

        $governorates = Governorate::where('status', 'active')->get();
        return view('site.payment', compact('carts', 'totalPrice', 'governorates'));
    }

    public function addInvoice()
    {
        $customerId = Cookie::get('customerId');
        $carts = Cart::where('customerId', $customerId)->get();
        $totalPrice =  Cart::where('customerId', $customerId)->sum('totalPrice');
        // return $totalPrice;
        return view('site.payment', compact('carts', 'totalPrice'));
    }


    public function getCities($id)
    {
        $data = City::where("governorate_id", $id)
            ->get(["name", "id"]);
        return response()->json($data);
    }

    public function storePayment(Request $request)
    {
        $customerId = Cookie::get('customerId');
        $name = $request->first_name . ' ' . $request->last_name;
        $totalPrice = $totalPrice =  Cart::where('customerId', $customerId)->sum('totalPrice');

        $totalPrice += 150;
        $carts =  Cart::where('customerId', $customerId)->get();

        $invoice = Invoice::create([
            'name' => $name,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'email' => $request->email,
            'zip_code' => $request->zip_code,
            'totalPrice' => $totalPrice,
            'governorate_id' => $request->governorate_id,
            'city_id' => $request->city_id,
        ]);
        $id =  $invoice->id;
        foreach ($carts as $cart) {
            $cart->update([
                'invoice_id' => $id,
                'status' => 'inInvoice',
            ]);
        }

        if ($request->paymet == 'vodafon') {

        }

        if ($request->paymet == 'instaPay'){

        }

        if ($request->paymet == 'cash') {
            
        }




    }
}
