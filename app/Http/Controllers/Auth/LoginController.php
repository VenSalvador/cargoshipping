<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override the credentials method to provide custom authentication credentials
    protected function credentials(Request $request)
    {
        // Customize this method according to your authentication logic
        return $request->only($this->username(), 'password');
    }
}
