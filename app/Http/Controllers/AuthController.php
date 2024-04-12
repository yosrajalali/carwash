<?php

namespace App\Http\Controllers;

use App\Http\Requests\submitLoginRequest;
use App\Http\Requests\submitRegisterRequest;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function submitLogin(submitLoginRequest $request)
    {
        $user = User::query()->where('phone_number', $request->get('phone_number'))->first();

        if (empty($user) || !Hash::check($request->get('password'), $user->password)){
            return back()->with('error', 'phone number or password is not correct');
        }

        Auth::login($user);

        return to_route('home.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.show');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function submitRegister(submitRegisterRequest $request)
    {
        $user = User::create($request->validated());

        Auth::login($user);
        return redirect()->route('home.index')->with('success', 'registered successfully');
    }
}
