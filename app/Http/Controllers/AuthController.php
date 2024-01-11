<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // public function Form()
    // {
       
    //     return view('password-forgot');
    // }

    public function loadRegister()
    {
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'string|required|min:2',
            'last_name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:6'
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //in this code only name can support firstname lastname not support
        // $user = User::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password), // Make sure to hash the password!

        // ]);

        // Auth::login($user, $request->has('remember'));
        return redirect('/login')->with('success', 'Your Registration has been successfull.');
    }


    public function loadLogin()
    {
        if (Auth::user()) {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        //     $userCredential = $request->only('email','password');
        //     if(Auth::attempt($userCredential)){

        //         $route = $this->redirectDash();
        //         return redirect($route);
        //     }
        //     else{
        //         return back()->with('error','Username & Password is incorrect');
        //     }
        // }

        // $user = User::where('email', '=', $request->email)->first();

        // if ($user) {
        //     // Check if the user is active
        //     if ($user->status == 0) {
        //         return back()->withErrors([
        //             'email' => 'Your account is not active.',
        //         ]);
        //     }

        //     // if ($request->password == $user->password) {
        //     if (Hash::check($request->password, $user->password)) {
        //         Auth::login($user, $request->has('remember'));

        //         $route = $this->redirectDash();
        //                  return redirect($route);
        //        // return redirect("/student/view")->withSuccess('Login details are valid');
        //     } else {
        //         return back()->withErrors([
        //             'password' => ' password is incorrect.',
        //         ]);
        //     }
        // } else {
        //     return back()->withErrors([
        //         'email' => ' email does not match our records.',
        //     ]);
        // }
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => ' Email is not registered.',
            ]);
        }
           // Check if the user is active
            if ($user->status == 0) {
                return back()->withErrors([
                    'email' => 'Your account is not active.',
                ]);
            }


        // If user exists, try to authenticate
        $userCredential = $request->only('email', 'password');
        if (Auth::attempt($userCredential, $request->has('remember'))) {
            return redirect($this->redirectDash());
        } else {
            return back()->withErrors([
                'password' => ' password is incorrect.',
            ]);
        }
    }




    public function loadDashboard()
    {
        return view('user.dashboard');
    }


    public function redirectDash()
    {
        $redirect = '';

        if (Auth::user() && Auth::user()->role == 1) {
            $redirect = '/super-admin/dashboard';
        } else if (Auth::user() && Auth::user()->role == 2) {
            $redirect = '/sub-admin/dashboard';
        } else if (Auth::user() && Auth::user()->role == 3) {
            $redirect = '/admin/dashboard';
        } else {
            // $redirect = '/user/dashboard';


        }

        return $redirect;
    }

    public function logout(Request $request)
    {
        // $request->session()->flush();
        Session::flush();
        Auth::logout();
        return redirect('/home')->with('success', 'You have been successfully logged out.');
    }
}
