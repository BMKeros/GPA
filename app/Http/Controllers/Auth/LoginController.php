<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Cart;

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
    protected function redirectTo(){
        if (\Auth::user()->role->id == 1){
            return '/admin/dashboard';
        }
        else{
            return '/user/dashboard';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $cart = Cart::all();
        $units = $cart->sum('quantity');

        $cart->each(function($cart){
            $cart->user;
            $cart->product;
        });
        

        \Session::put('cart', $cart);
        \Session::put('units', $units);

        $this->middleware('guest')->except('logout');
    }
}
