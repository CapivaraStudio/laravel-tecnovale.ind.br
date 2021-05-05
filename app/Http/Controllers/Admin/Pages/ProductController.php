<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
      $categories = Category::all();
      $products = Product::all();
      return view('admin.pages.product.index', [
        'products'=>$products,
        'categories'=>$categories
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories = Category::all();
      return view('admin.pages.product.create', [
        'categories'=>$categories
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try {
        $product = new Product();
        $product->name          = $request->name;
        $product->category      = $request->category;
        $product->description   = $request->description;
        $product->technology    = $request->technology;
        $product->presentation  = $request->presentation;
        $product->active        = ($request->active==1 ? 1 : 0);
        $product->save();
        return redirect()->route('admin.product')->with('status', 'Produto cadastrado com sucesso!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withInput($request->except('_token'))->withErrors([$exception->getMessage()]);
      }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
      $categories = Category::all();
      return view('admin.pages.product.edit', [
        'product'=>$product,
        'categories'=>$categories
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Product $product)
    {
      try {
        $product->name          = $request->name;
        $product->category      = $request->category;
        $product->description   = $request->description;
        $product->technology    = $request->technology;
        $product->presentation  = $request->presentation;
        $product->active        = ($request->active==1 ? 1 : 0);
        $product->save();
        return redirect()->back()->with('status', 'Os dados foram alterados!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Product $product)
    {
      try {
        Storage::deleteDirectory('news/'.$product->id);
        $product->delete();
        return redirect()->route('admin.product')->with('status', 'Produto apagado com sucesso!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }
}
