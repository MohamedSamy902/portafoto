<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:category-list',   ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('dashbord.categories.index', \compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            // return $request->validated();

            $category = Category::create([
                'name' => [
                    'en' => $request->name,
                    'ar' => $request->name_ar,
                ],

            ]);

            if ($category) {

                return redirect()->route('categories.create')->with('success', __('master.messages_save'));
            } else {
                return redirect()->route('categories.index')->with('error', __('master.messages_error'));
            }
        } catch (\Exception $ex) {
            return redirect()->route('categories.index')->with('error', __('master.messages_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    // public function show(category $category)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $category = Category::findOrFail($category->id);
        return view('dashbord.categories.edit', \compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, category $category)
    {

        if ($category) {
            $category->update([
                'name' => [
                    'en' => $request->name,
                    'ar' => $request->name_ar,
                ],

            ]);
            return redirect()->route('categories.index')->with('success', __('master.messages_edit'));

        }
        return redirect()->route('categories.index')->with('error', __('master.messages_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        try {
            $category = Category::findOrFail($category->id);
            if ($category->product->count() == 0) {
                $category->delete();
            } else {
                return redirect()->route('categories.index')->with(['error' => 'هناك موظفين في هذا القسم']);
            }
            return redirect()->route('categories.index')->with('success', __('master.messages_delete'));
        } catch (\Exception $ex) {
            return redirect()->route('categories.index')->with('error', __('master.messages_error'));
        }
    }
}
