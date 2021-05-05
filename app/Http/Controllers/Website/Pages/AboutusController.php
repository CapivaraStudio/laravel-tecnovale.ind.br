<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
  public function index()
  {
    $aboutus = Info::all()->where('id', 1)->first();
    return  view('website.pages.aboutus', [
      'aboutus'=>$aboutus
    ]);
  }
}
