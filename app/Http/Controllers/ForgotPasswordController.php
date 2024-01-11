<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User; // Import the User model at the top of your file
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function Form()
    {
        return view('password-forgot');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'This email is not registered in our system.']);
        }

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $action_link = route('main.password.reset', ['token' => $token, 'email' => $request->email]);
        $body = "We received a request to reset the password for <b>Your App Name</b> account associated with " . $request->email . ". You can reset your password by clicking the link below: " . $action_link;

        Mail::send('password-reset', ['token' => $token, 'body' => $body], function ($message) use ($request) {
            $message->from('bikram12dlk@gmail.com');
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return back()->with('success', 'We have e-mailed your password reset link!');
    }




    public function showResetForm($token = null)
    {
        $email = request('email');  // Get email from the URL
        return view('password-reset-form', ['token' => $token, 'email' => $email]);
        // return view('password-reset-form', ['token' => $token]);

    }



    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $reset = DB::table('password_resets')->where('token', $request->token)->first();
        if (!$reset) return back()->withErrors(['token' => 'This token is invalid.']);

        if (Carbon::parse($reset->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['token' => 'This token has expired.']);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        // session()->flash('success', 'Order successfully placed!');

        return redirect()->route('login')->with('success', 'Password has been reset!');
    }
}
