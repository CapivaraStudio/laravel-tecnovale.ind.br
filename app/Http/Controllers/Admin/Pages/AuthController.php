<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

  public function showLogin()
  {
    return view('admin.pages.auth.login');
  }

  public function login(Request $request)
  {
    $credential = [
      'email' => $request->email,
      'password' => $request->password,
    ];
    if( Auth::attempt($credential) ) {
      return redirect()->route('admin.dashboard');
    }
    return redirect()->back()->withInput()->withErrors(['E-mail ou senha inválidos']);
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('admin.login');
  }

  public function password()
  {
    $user = User::all()->where('id', Auth::user()->getAuthIdentifier())->first();
    return view('admin.pages.auth.password', [
      'user'=>$user
    ]);
  }

  public function update(Request $request, User $user)
  {
    if(Hash::check($request->password, $user->password)) {
      if($request->newPassword === $request->repeatPassword) {
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return redirect()->back()->with('status', 'Senha alterada com sucesso!');
      } else {
        return redirect()->back()->withErrors(['A repetição de senha está incorreta!']);
      }
    }else {
      return redirect()->back()->withErrors(['A senha informada está incorreta!']);
    }
  }
}
