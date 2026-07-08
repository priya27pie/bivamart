<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
 public function userLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'Admin') {

                Auth::logout();

                return back()->with('error', 'Admins cannot login here');
            }

            session([
                'user_phone' => $user->phone,
                'user_email' => $user->email,
                'user_name'  => $user->name,
            ]);
            if (request('redirect') == 'cart') {
                return redirect()->route('cart.index');
            }
            return redirect('/profile');
        }

        return back()->with('error', 'Wrong Credentials');
    }

  public function login(Request $request)
{
    return $this->userLogin($request);
}  


public function Userlogout(Request $request){

   
       Auth::logout(); // Log out the current user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return redirect('index'); 
}
}
