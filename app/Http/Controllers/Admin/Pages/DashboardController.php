<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $counter = [
      'news'=> News::all()->count(),
      'newsImages'=> NewsImage::all()->count(),
      'products'=> Product::all()->count(),
      'productsImages'=> ProductImage::all()->count(),
      'categories'=> Category::all()->count(),
      'contacts'=> Contact::all()->count(),
      'readContacts'=> Contact::all()->where('read', true)->count(),
      'unreadContacts'=> Contact::all()->where('read', false)->count(),
    ];
    return view('admin.pages.dashboard', [
      'counter'=>$counter
    ]);
  }
}
