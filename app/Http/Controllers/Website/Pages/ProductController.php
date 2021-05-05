<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all()->where('active', true);
    return view('website.pages.category', [
      'products'=>$products,
    ]);
  }
  public function category(Category $category)
  {
    $products = Product::all()->where('active', true)->where('category', $category->id);
    return view('website.pages.category', [
      'category'=>$category,
      'products'=>$products,
    ]);
  }

  public function detail(Category $category, Product $product)
  {
    return view('website.pages.product-detail', [
      'product'=>$product,
    ]);
  }
}
