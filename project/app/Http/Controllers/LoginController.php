<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    public function index(Request $request){
        return view('auth.login',
    [
        'model' => new User()
    ]);
    }

    public function acesso(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
  
        return back()->withErrors([
            'email' => 'usuário ou senha inválidos!',
        ]);

    }

    public function logout(Request $request) {

        Auth::logout(); 

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect('/');

    }
}
