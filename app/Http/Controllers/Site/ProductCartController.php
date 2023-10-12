<?php


namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StandardColor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\Cart\AddToCartRequest;

class ProductCartController extends Controller
{
    public function addToCart(AddToCartRequest $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $customerId = Cookie::get('customerId');
        $size = Size::where('id', $request->size)->first();
        if($product->price == '') {
            $price = $size->price;
        }else {
            $price = $product->price;
        }

        if (isset($size->standardSize->name)) {
            $sizeProduct = $size->standardSize->name;
        }else {
            $sizeProduct = '';
        }

        $product->carts()->create([
            'standard_color_id' => $request->standard_color_id,
            'quantity' => $request->quantity,
            'customerId' => $customerId,
            'price' => $price,
            'size' => $sizeProduct,
            'totalPrice' => $price * $request->quantity,
        ]);

        return redirect()->back()
            ->with('success', __('site.messages_addToCart'));
    }

    public function removeToCart($id)
    {
        $customerId = Cookie::get('customerId');
        Cart::where('id', $id)->where('customerId', $customerId)->first()->delete();

        return redirect()->back()
            ->with('success', __('site.messages_removeToCart'));
    }



}
