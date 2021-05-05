<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsImageController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(News $news)
  {
    $newsImages = $news->images;
    $primaryImage = $news->images->where('primary', true)->first();
    return view('admin.pages.news.images', [
      'news'=>$news,
      'newsImages'=>$newsImages,
      'primaryImage'=>$primaryImage
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   */
  public function store(Request $request)
  {
    if($request->hasFile('images')) {
      try {
        foreach ($request->file('images') as $image) {
          $newsImage = new NewsImage();
          $newsImage->news = $request->news;
          $newsImage->path = $image->store('news/'.$request->news);
          $newsImage->save();
        }
        $oldPrimary = NewsImage::all()
          ->where('news', $request->news)
          ->where('primary', true)->first();
        if(!$oldPrimary) {
          $newPrimary = NewsImage::all()->first();
          $newPrimary->primary = true;
          $newPrimary->save();
        }
        return redirect()->back()->with('status', 'Imagens cadastradas com sucesso!');
      } catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }

    }else {
      return redirect()->back()->withErrors(['Nenhuma imagem inserida!']);
    }
  }

  /**
   * Display the specified resource.
   *
   */
  public function show(NewsImage $newsImage)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   */
  public function edit(NewsImage $newsImage)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   */
  public function update(NewsImage $newsImage, NewsImage $primaryImage)
  {
    try {
      $primaryImage->primary = false;
      $primaryImage->save();
      $newsImage->primary = true;
      $newsImage->save();
      return redirect()->back()->with('status', 'Imagem principal alterada com sucesso!');
    } catch (\Exception $exception) {
      return redirect()->back()->withErrors([$exception->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(NewsImage $newsImage)
  {
    try {
      Storage::delete($newsImage->path);
      if($newsImage->primary) {
        $newPrimary = NewsImage::all()->where('primary', false)->first();
        $newPrimary->primary = true;
        $newPrimary->save();
      }
      $newsImage->delete();
      return redirect()->back()->with('status', 'Imagem apagada com sucesso!');
    }catch (\Exception $exception) {
      return redirect()->back()->withErrors([$exception->getMessage()]);
    }
  }
}
