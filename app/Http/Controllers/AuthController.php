<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Returns registration view.
     */
    public function signup()
    {
        return view('auth.registration');
    }

    /**
     * Validates registration input and creates user.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $user_instance = $this->createUser($data);

        Auth::login($user_instance);
        return redirect("/dashboard");
    }

    /**
     * Create a User based off model and add to DB.
     *
     * @param array
     */
    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Display login form.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

//            return redirect()->intended('quizcardsfloopy');

            return redirect("/authenticated");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/logged-out');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutOtherDevices(Request $request)
    {
        $currentPassword = $request->validate([
            'password' => ['required'],
        ]);

        Auth::logoutOtherDevices($currentPassword['password']);

        return redirect('/logged-out-other-devices');
    }

    /**
     * Return the default view for logged-in users.
     *
     */
    public function dashboard()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }

        return redirect("/dashboard-fail");
    }

}
