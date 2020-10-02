<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('irfan');
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('backend.categories.index', compact('parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        return view('backend.categories.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->save();
        
        return redirect('admin/categories')->with('success', 'Category saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //$category = Category::find($id);
        // dd($category->parent);
        // $parentCategories = Category::where('parent_id',$category->parent_id)->get();
        $categories = Category::where('parent_id',NULL)->get();
        $parentCategory = $category->parent;
        // dd($parentCategory);
        return view('backend.categories.edit', compact('category', 'categories', 'parentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($category);
        $request->validate([
            'name'=>'required'
        ]);
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect('admin/categories')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        //event(new CategoryDeleted($post));

        return redirect()->route('admin.categories.index')->withFlashSuccess(__('alerts.backend.posts.deleted'));
    }
}
