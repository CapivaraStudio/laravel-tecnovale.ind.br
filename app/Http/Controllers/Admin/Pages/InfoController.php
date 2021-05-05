<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    public function edit(Info $info)
    {
      return view('admin.pages.info.edit', [
        'info'=>$info
      ]);
    }

    public function update(Request $request, Info $info)
    {
      try {
        $info->email    = $request->email;
        $info->phone1   = $request->phone1;
        $info->phone2   = $request->phone2;
        $info->whatsapp = $request->whatsapp;
        $info->aboutus  = $request->aboutus;
        $info->mission  = $request->mission;
        $info->vision   = $request->vision;
        $info->values   = $request->values;
        $info->save();
        return redirect()->back()->with('status', 'Os dados foram alterados!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        //
    }
}
