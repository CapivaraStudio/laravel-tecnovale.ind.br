<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function index()
  {
    $news = News::all();
    return view('website.pages.news', [
      'news'=>$news,
    ]);
  }

  public function detail(News $news)
  {
    return view('website.pages.news-detail', [
      'news'=>$news
    ]);
  }
}
