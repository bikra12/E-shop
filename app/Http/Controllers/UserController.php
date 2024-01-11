<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Import the User model at the top of your file
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class UserController extends Controller
{
    //
    public function dashboard()
    {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = Auth::user()->orders;
        return view('user.order', compact('orders','user'));
    }

    public function editprofile($id)
    {
        $user = User::find($id);
        return view('user.edit-profile', compact('user'));
    }

   

    public function updateProfile(Request $request, $id)
    {
        // $user = Auth::user();
        $user = User::find($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' ,
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->save();
        // return view('user.dashboard', compact('user'))->with('success', 'Profile updated successfully!'); this is not work
        return redirect()->route('dashboard', compact('user'))->with('success', 'Profile updated successfully!');

    }


    public function change()
    {
        $user = Auth::user();
        return view('user.chengepassword',compact('user'));
    }
    public function changePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        // return back()->with("status", "Password changed successfully!");
        return redirect()->route('dashboard')->with('success', 'Password changed successfully!');

    }



    // public function forgotPassword()
    // {
    //     return view('user.forgot-password');
    // }


    // public function forgotPasswordpost(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //     ]);

    //     $user = User::where('email', $request->email)->first();

    //     if (!$user) {
    //         return back()->withErrors(['email' => 'This email is not registered in our system.']);
    //     }

    //     $token = Str::random(60);

    //     DB::table('password_resets')->insert([
    //         'email' => $request->email,
    //         'token' => $token,
    //         'created_at' => Carbon::now()
    //     ]);

    //     $action_link = route('password.reset', ['token' => $token, 'email' => $request->email]);
    //     $body = "We received a request to reset the password for <b>Your App Name</b> account associated with " . $request->email . ". You can reset your password by clicking the link below: " . $action_link;
    //     Mail::send('user.reset-password', ['token' => $token, 'action_link' => $action_link], function ($message) use ($request) {

    //     // Mail::send('user.reset-password', ['token' => $token, 'body' => $body], function ($message) use ($request) {
    //         $message->from('bikram12dlk@gmail.com');
    //         $message->to($request->email);
    //         $message->subject('Reset Password Notification');
    //     });

    //     return back()->with('message', 'We have e-mailed your password reset link!');
    // }



    // public function forgotPasswordpost(Request $request)
    // {
    //     $email = $request->input('email');
    //     Log::info("Processing reset request for email: {$email}");

    //     $request->validate(['email' => 'required|email']);

    //     $user = User::where('email', $email)->first();

    //     if (!$user) {
    //         Log::warning("Email not found: {$email}");
    //         return back()->withErrors(['email' => 'This email is not registered in our system.']);
    //     }

    //     $response = Password::broker()->sendResetLink($request->only('email'));

    //     if ($response == Password::RESET_LINK_SENT) {
    //         Log::info("Reset link sent successfully to: {$email}");
    //         return back()->with('status', 'Reset link sent to your email address.');
    //     } else {
    //         Log::error("Failed to send reset link to: {$email}");
    //         return back()->withErrors(['email' => 'Failed to send reset email. Please try again later.']);
    //     }
    // }


    // public function showResetForm($token = null)
    // {
    //     return view('user.reset-password-form', ['token' => $token]);
    // }


    // public function showResetForm($token = null)
    // {
    //     $email = request('email');  // Get email from the URL
    //     return view('user.reset-password-form', ['token' => $token, 'email' => $email]);
    // }


    // public function resetPassword(Request $request)
    // {
    //     $request->validate([
    //         'token' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed|min:8',
    //     ]);

    //     $passwordResetResponse = Password::broker()->reset(
    //         $request->only('email', 'password', 'password_confirmation', 'token'),
    //         function ($user, $password) {
    //             $user->password = Hash::make($password);
    //             $user->save();
    //         }
    //     );

    //     if ($passwordResetResponse == Password::PASSWORD_RESET) {
    //         return redirect()->route('login')->with('status', 'Password has been reset!');
    //     } else {
    //         return back()->withErrors(['email' => [trans($passwordResetResponse)]]);
    //     }
    // }

    // public function showResetForm($token = null)
    // {
    //     return view('user.reset-password', ['token' => $token]);
    // }

    // public function resetPassword(Request $request)
    // {
    //     $request->validate([
    //         'token' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed|min:8',
    //     ]);

    //     $passwordResetResponse = Password::broker()->reset(
    //         $request->only('email', 'password', 'password_confirmation', 'token'),
    //         function ($user, $password) {
    //             $user->password = Hash::make($password);
    //             $user->save();
    //         }
    //     );

    //     if ($passwordResetResponse == Password::PASSWORD_RESET) {
    //         return redirect()->route('login')->with('status', 'Password has been reset!');
    //     } else {
    //         return back()->withErrors(['email' => [trans($passwordResetResponse)]]);
    //     }
    // }
}
