<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    public function show($id) {

        $user = DB::table('users')->where('id', $id)->first();
        
        if ( $user ) {
            return view('profile', ['user' => $user]);
            
        } else {
            return redirect(route('aut'));
        }
    }

    public function statusComment(Request $request) {

        $validateStatus = $request->validate([
            'status' => 'required'
        ]);
 
        Auth::user()->comment()->create([
            'body' => $request->input('status')
        ]);
        
        return redirect()->intended(url()->previous());
        
    }
}
