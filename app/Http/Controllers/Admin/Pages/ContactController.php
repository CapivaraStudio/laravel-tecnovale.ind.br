<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $contacts = Contact::all();
      return view('admin.pages.contact.index', [
        'contacts'=>$contacts
      ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
      if($contact->read==false) {
        $contact->read = 1;
        $contact->save();
      }
      return view('admin.pages.contact.show', [
        'contact'=>$contact,
      ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
      try {
        $contact->delete();
        return redirect()->route('admin.contact')->with('status', 'Contato apagado com sucesso!');
      }
      catch (\Exception $exception) {
        return redirect()->back()->withErrors([$exception->getMessage()]);
      }
    }
}
