<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class LoginController extends Controller
{
    public function showlogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;


        if (!is_null($remember))
        {
            $remember = true;
        }
        else
        {
            $remember = false;
        }

        $user = User::where("email", $email)->first();

        if ($user && Hash::check($password,$user->password))
        {
           Auth::login($user);
           return redirect()->route('home');
        }
        else {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => "Verdiğiniz bilgilerle eşleşen bir kullanıcı bulunamadı."
                ])
                ->onlyInput("email", "remember");

        }


    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route("login");

        }

    }
}
