<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required',
        ]);

         // Attempt to authenticate the user with the provided email and password
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            // Check the role of the authenticated user
            if (auth()->user()->role == 'admin') {
                // Redirect to the admin home page if the user is an admin
                return redirect()->route('admin.index');
            } 

            else if(auth()->user()->role == 'technical')
            {
                return redirect()->route('technical.index');
            }

            else if(auth()->user()->role == 'bursary')
            {
                return redirect()->route('bursary.index');

            }

            else if(auth()->user()->role == 'pupuk')
            {
                return redirect()->route('pupuk.index');

            }
            
            else {
                // Redirect to the regular user home page for non-admin users
                return redirect()->route('user.index');
            }

        } 
        else 
        {
            // Redirect back to the login page with an error message if authentication fails
            return redirect()->route('login')->with('error', 'Email address and password are wrong.');
        }
    }
}
