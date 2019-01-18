<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function sendSignInLink(Request $request) {
        $user = User::whereEmail($request->email)->first();
        $link = URL::temporarySignedRoute(
            'autologin', now()->addDays(3), [
                'user_id' => $user->id,
                'url_redirect' => '/'
            ]
        );

        \Mail::to($user->email)->send(new \App\Mail\SignInLink($link));

        return back()->with('message', 'Check your inbox!');
    }

    public function autologin(Request $request) {
        if (!$request->hasValidSignature()) {
            return abort(403);
        }

        Auth::loginUsingId($request->input('user_id'), true);


        
        return redirect($request->input('url_redirect'))->with('message', 'Welcome!');
    }
}
