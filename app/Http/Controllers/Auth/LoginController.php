<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

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
    // api Login
    public function gitHub_Login()
    {

        return Socialite::driver('github')->redirect();
    }
    public function github_callback()
    {
        $githubUser  = Socialite::driver('github')->user();
        
        $existUser = User::where('email', $githubUser->email)->where('auth_type', 'github')->first();
        if (!$existUser) {
            $uuid = Hash::make(Str::uuid()->toString());
            $user = new User;
            $user->name = $githubUser->name;
            $user->email = $githubUser->email;
            $user->password = $uuid;
            $user->auth_type = 'github';
            try {
                $user->save();
            } catch (\Illuminate\Database\QueryException $exception) {
                return redirect('/login')->with('error', 'This email address is already registered.');
            }
            Auth::login($user);
        } else {
            Auth::login($existUser);
        }
        return to_route('home');
    }
    public function google_Login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
     
        $googleUser  = Socialite::driver('google')->user();
        $existUser = User::where('email', $googleUser->email)->where('auth_type', 'google')->first();
        if (!$existUser) {
            $uuid = Hash::make(Str::uuid()->toString());
            $user = new User;
            $user->name = $googleUser->name;
            $user->email = $googleUser->email;
            $user->password = $uuid;
            $user->auth_type = 'google';
            try {
                $user->save();
            } catch (\Illuminate\Database\QueryException $exception) {
                return redirect('/login')->with('error', 'This email address is already registered.');
            }
            Auth::login($user);
        } else {
            Auth::login($existUser);
        }
        return to_route('home');
    }
}
