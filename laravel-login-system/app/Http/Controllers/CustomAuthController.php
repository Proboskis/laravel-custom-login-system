<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:20',
            'password_confirmation' => 'required|min:6|max:20'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have registered successfully.');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later.');
        }

    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (hash::check($request->password, $user->password)) {
                $request->session()->put('login_id', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'The password does not match.');
            }
        } else {
            return back()->with('fail', 'This email is not registered.');
        }
    }

    public function dashboard()
    {
        $data = [];
        if (Session::has('login_id')) {
            $data = User::where('id', '=', Session::get('login_id'))->first();
        }
        return view('dashboard', compact('data'));
    }

    public function logout()
    {
        if (Session::has('login_id')) {
            Session::pull('login_id');
            return redirect('login');
        }
    }

}
