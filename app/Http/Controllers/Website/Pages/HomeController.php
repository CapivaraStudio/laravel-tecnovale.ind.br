<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Info;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $homeInfo = Info::all()->where('id', 1)->first();
    $products = Product::all()->where('active', true)->random(4);
    return view('website.pages.home', [
      'homeInfo'=>$homeInfo,
      'products'=>$products,
    ]);
  }
}
