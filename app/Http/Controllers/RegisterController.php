<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:30'
        ]);

        if ( DB::table('users')->where('email', $validate['email'])->exists() ) {
            return redirect(route('reg'))->withErrors([
                'email' => 'Такой пользователь уже существует'
            ]);
        }

        $user = User::create($validate);

        if ( $user ) {
            Auth::login($user);
            return redirect(route('aut'));

        } else {
            return redirect(route('reg'))->withErrors([
                'formError' => 'Произошла ошибка при сохранении пользователя'
            ]);
        }

    }
}
