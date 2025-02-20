<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function verifyMassage()
    {
        return view('pages.verify_massage');
    }
    public function againVerifyEmail()
    {
        $verify_token = Str::random(20);
        $user = auth()->user();
        Mail::to($user->email)->send(new VerifyEmail($user, $verify_token));
        return back()->with('success_msg', 'Resend email send successfully send');
    }

    public function verifyEmail()
    {
        $user = Auth()->user();
        $user->update([
            'remember_token' => request('token'),
            'email_verified_at' => now(),
        ]);
        return redirect()->route('payment');
    }
    public function profileUpdate(Request $request) {
        auth()->user()->update([
            'name'=>$request->name,
        ]);
        return back()->with('success', 'Update profile successfully send');
    }
    public function changePassword(Request $request){
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new-password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success_msg', 'Password changed successfully');
    }
}
