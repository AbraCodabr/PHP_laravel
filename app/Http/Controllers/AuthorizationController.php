<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthorizationController extends Controller
{
    public function authorizate(Request $request) 
    {
        
        $valudate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:30'
        ]);
    
        if (Auth::attempt($valudate)) {

            $id = DB::table('users')->where('email', $valudate['email'])->value('id');
            return redirect()->intended('/profile/' . $id);

        } else {
            return redirect(route('aut'))->withErrors([
                'email' => 'Не удалось авторизоваться'
            ]);
        }
        
    }
}
