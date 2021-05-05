<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Info;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index()
  {
    $contact = Info::all()->where('id', 1)->first();
    return view('website.pages.contact', [
      'contact'=>$contact
    ]);
  }
  public function store(Request $request) {
    try {
      $contact = new Contact();
      $contact->name = $request->name;
      $contact->email = $request->email;
      $contact->phone = $request->phone;
      $contact->message = $request->message;
      $contact->read = false;
      $contact->save();
      return redirect()->route('website.contact')->with('status', 'Mensagem enviada com sucesso!');
    }
    catch (\Exception $exception) {
      return redirect()->back()->withInput($request->except('_token'))->withErrors([$exception->getMessage()]);
    }
  }
}
