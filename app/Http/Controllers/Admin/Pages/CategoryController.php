<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $categories = Category::all();
      return view('admin.pages.category.index', [
        'categories'=>$categories
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category')->with('status', 'Categoria cadastrada com sucesso!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withInput($request->except('_token'))->withErrors([$exception->getMessage()]);
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
      return view('admin.pages.category.edit', [
        'category'=>$category,
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
      try {
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('status', 'Os dados foram alterados!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
      try {
        $category->delete();
        return redirect()->route('admin.category')->with('status', 'Categoria apagada com sucesso!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }
}
