<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function checklogin(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $user = User::where('username', $username)->where('password', $password)->first();

        if ($user) {
            session(['login' => 'true']);
            session(['nama' => $user->username]);
            return redirect('dashboard');
        } else {
            return redirect('login');
        }
    }

    public function logout()
    {
        if (session()->has('login')) {
            session()->forget('login');
            return redirect('login');
        }
    } 
}
