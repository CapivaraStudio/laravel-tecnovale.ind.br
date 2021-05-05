<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
      $news = News::all();
      return view('admin.pages.news.index', [
        'news'=>$news
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
      return view('admin.pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      try {
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->contenttext;
        $news->save();
        return redirect()->route('admin.news')->with('status', 'Informativo cadastrado com sucesso!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
      return view('admin.pages.news.edit', [
        'news'=>$news
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
      try {
        $news->title   = $request->title;
        $news->content = $request->contenttext;
        $news->save();
        return redirect()->back()->with('status', 'Os dados foram alterados!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
      try {
        Storage::deleteDirectory('news/'.$news->id);
        $news->delete();
        return redirect()->route('admin.news')->with('status', 'Informativo apagado com sucesso!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }
}
