<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        Auth::login($user);

        return redirect(route('home')); // redirect('/posts')
    }

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        // $credentials = [
        //     'email' => $request->get("email"),
        //     'password' => $request->get("password"),
        // ];

        // $user = User::where('email', $credentials['email'])->first();
        // if ($user == null) {
        //     return back();
        // }
        // $password_correct = Hash::check($credentials['password'], $user->password);
        // if (!$password_correct) {
        //     return back();
        // }
        // Auth::login($user);

        // Auth::attempt($credential) trazi korisnika po emailu $credentials['email']
        // provjerava da li se $credentials['password'] poklapa sa hash-om korisnikovog passworda u bazi
        // ako je sve ok - uloguje korisnika, tj upise id ulogovanog korisnika na sesiju
        // ako nesto od provjera nije ok - vraca false
        $login_success = Auth::attempt($credentials);
        if ($login_success) {
            return redirect(route('home'));
        } else {
            return view('auth.login', ['invalid_credentials' => true]);
        }
    }

    public function logout()
    {
    }
}
