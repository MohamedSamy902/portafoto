<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\Size;
use App\Models\StandardColor;
use App\Models\StandardSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('dashbord.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = StandardColor::get();
        $sizes  = StandardSize::get();
        return view('dashbord.products.create', compact('colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            // return $data;
            $product = Product::create([
                'name' => [
                    'en' => $request->name,
                    'ar' => $request->name_ar,
                ],
                'description' => [
                    'en' => $request->description,
                    'ar' => $request->description_ar,
                ],

                'price' =>  $request->price,
                'discount' => $request->discount,
                'status'  => $request->status,
                'best' => $request->best,
            ]);

            if ($request->standard_size_id) {

                if (count($request->standard_size_id) == count($request->price_size)) {
                    for ($i = 0; $i < count($request->price_size); $i++) {
                        if ($request->standard_size_id[$i] != null && $request->price_size[$i] != null) {
                            $product->size()->create([
                                'standard_size_id' => $request->standard_size_id[$i],
                                'price' => $request->price_size[$i],
                                'discount' => $request->discount_size[$i]
                            ]);
                        }
                    }
                }
            }

            if ($request->colors) {
                foreach ($request->colors as $color) {
                    $product->color()->create([
                        'standard_color_id' => $color
                    ]);
                }
            }

            if ($request->file('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $product->addMedia($photo)->toMediaCollection('products');
                }
            }


            DB::commit();

            return redirect()->back()
                ->with('success', __('master.messages_save'));
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
            return redirect()->back()
                ->with('error', __('master.messages_error'));
        }

        // return $request->file('photos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $colors = StandardColor::get();
        $sizes  = StandardSize::get();
        return view('dashbord.products.edit', compact('product', 'colors', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            DB::beginTransaction();

            $product->update([
                'name' => [
                    'en' => $request->name,
                    'ar' => $request->name_ar,
                ],
                'description' => [
                    'en' => $request->description,
                    'ar' => $request->description_ar,
                ],

                'price' =>  $request->price,
                'discount' => $request->discount,
                'status'  => $request->status,
                'best' => $request->best,
            ]);

            if ($request->standard_size_id) {

                if (count($request->standard_size_id) == count($request->price_size)) {
                    for ($i = 0; $i < count($request->price_size); $i++) {
                        $uniqSize = Size::where('standard_size_id', $request->standard_size_id)->where('product_id', $product->id)->count();
                        if ($uniqSize == 0) {
                            if ($request->standard_size_id[$i] != null && $request->price_size[$i] != null) {
                                $product->size()->create([
                                    'standard_size_id' => $request->standard_size_id[$i],
                                    'price' => $request->price_size[$i],
                                    'discount' => $request->discount_size[$i]
                                ]);
                            }
                        } else {
                            return redirect()->back()
                                ->with('error', __('master.messages_error_size'));
                        }
                    }
                }
            }



            if ($request->file('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $product->addMedia($photo)->toMediaCollection('products');
                }
            }


            DB::commit();

            return redirect()->back()
                ->with('success', __('master.messages_edit'));
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
            return redirect()->back()
                ->with('error', __('master.messages_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        return $product;

    }

    public function deleteImage($productId, $mediaId)
    {
        // Redirect back to the product edit page
        $product = Product::findOrFail($productId);

        // Retrieve the media item by ID from the 'images' collection
        $media = Media::findOrFail($mediaId);
        // Delete the media file from disk and the database
        $product->deleteMedia($media);

        // Redirect back to the product edit page
        return redirect()->back()
                ->with('success', __('master.messages_delete'));
    }
}
