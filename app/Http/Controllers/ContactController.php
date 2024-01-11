<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\mail\ContactMail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{

    public function contactUs()
    {
        return view('homepage.contactUs');
    }

    // public function sendEmail(Request $request)
    // {
    //     // $details= [
    //     //     'name'=>$request->name,
    //     //     'email'=>$request->email,
    //     //     'subject'=>$request->subject,
    //     //     'message'=>$request->message

    //     // ];
    //     $details= $request->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'required|email|max:255',
    //         'subject' => 'required|max:255',
    //         'message' => 'required',
    //     ]);

    //     Mail::to('bikram12dlk@gmail.com')->send(new ContactMail($details));
    //     return redirect()->back()->with('message', 'Thank you for your message! We will get back to you soon.');
    // }
    public function sendEmail(Request $request)
    {
        try {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ];

            // Validate the request inputs
            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|max:255',
                'message' => 'required',
            ]);
            // $email = $request->input('email');
            // Mail::to($email)->send(new ContactMail($details));


             Mail::to('bikram12dlk@gmail.com')->send(new ContactMail($details));
            return redirect()->back()->with('message', 'Thank you for your message! We will get back to you soon.');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error("Error sending contact email: " . $e->getMessage());

            // Return a user-friendly message
            return redirect()->back()->with('error', 'There was a problem sending your message. Please try again later.');
        }
    }



    // // Non-static function
    public function a()
    {
        self::name();
        $this->name1();
    }

    // // Another non-static function
    // public function b()
    // {
    //     // Calling function a() from function b()
    //      $this->a();
    //     return 'Function B was called and it called function A!';
    // }

    // // Static function
   public static function name(){
    return "Hello World";
   }
   public function name1(){
    return "Hello World";
   }
}
