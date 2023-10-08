<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashbord.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Request All In Form
            $category = $request->validated();
            // return $category;
            // Cereat Request
            $cat = Category::create([
                'name' => [
                    'en' => $request->name,
                    'ar' => $request->name_ar,
                ],
                'status' => $request->status,
            ]);
            // Check Done Or Fil
            if ($cat) {
                // Redirect Success Masseg
                return redirect()->back()->with(['success' => 'Success Save']);
            } else {
                // Return Error Massege
                return redirect()->back()->with(['error' => 'Please Try Again']);
            }
        } catch (\Exception $ex) {
            // Massege Error
            return redirect()->back()->with(['error' => 'Please Try Again']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function show(Category $category)
    // {
    //     $categories = Category::all();
    //     return view('dashbord.category.show', compact('categories'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            // Check Id In Request Or No
            if (isset($id) && !empty($id)) {
                // return $id;
                // Get Category With Id
                $category = Category::findOrFail($id);
                // return $category;
                // Check Category Found Or Fil
                if ($category) {
                    // Requrn Redirect With Success Massege
                    return view('dashbord.category.edit', compact('category', 'languages'));
                } else {
                    // Requrn Redirect With Error Massege
                    return redirect()->route('category.index')->with(['error' => 'Please Try Again']);
                }
            }
        } catch (\Exception $ex) {
            return redirect()->route('category.index')->with(['error' => 'Please Try Again']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try {
            // $category = Category::findOrFail($id);
            if ($category) {
                $data = $request->all();
                $status = $category->fill($data)->save();
                if ($status) {
                    return redirect()->route('category.index')->with(['success' => 'Success Update']);
                } else {
                    return redirect()->route('category.index')->with(['error' => 'Please Try Again']);
                }
            }
        } catch (\Exception $ex) {
            return redirect()->route('category.index')->with(['error' => 'Please Try Again']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return redirect()->route('category.index')->with(['success' => 'Success Delete']);
        } catch (\Exception $ex) {
            return redirect()->route('category.index')->with(['error' => 'Please Try Again']);
        }
    }
}
