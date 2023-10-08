<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;



class ProductFavoriteController extends Controller
{
    public function addToFavorites(Request $request, $id)
    {
        $product = Product::find($id);

        $favorites = json_decode($request->cookie('favorites', '[]'));

        // Add the new product ID to the list
        $favorites[] = $product->id;

        $cookie = cookie('favorites', json_encode($favorites));


        return response()->json(['message' => 'Product added to favorites', 'favorites' => $favorites])->withCookie($cookie);


    }

    public function showFavorites()
    {
        $favorites = Cookie::get('favorites');

        $favorites = json_decode($favorites, true);

        $favorites = Product::whereIn('id', $favorites)->with('media')->get();

        return response()->json(['message' => 'Product added to favorites', 'favorites' => $favorites]);

    }



    public function removeFromCookies(Request $request, $id)
    {
        $existingFavorites = json_decode($request->cookie('favorites'), true);

        // Remove the product ID from the favorites array
        $updatedFavorites = array_diff($existingFavorites, [$id]);

        // Update the favorites cookie with the new array of IDs
        $cookie = cookie('favorites', json_encode($updatedFavorites), 60);

        return response()->json(['success' => true])->cookie($cookie);
    }
}
