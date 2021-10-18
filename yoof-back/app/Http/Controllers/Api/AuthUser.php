<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUser extends Controller
{
    public function token()
    {
        if(Auth::user())
            return \response(json_encode([
              'token' => Auth::user()->api_token,
              'code' => 'success'
            ]));

        return \response(json_encode([
            'token' => null,
            'code' => 'err'
        ]));
    }

    public function user()
    {
        if(Auth::user())
            return \response(json_encode([
                'user' => Auth::user(),
                'data' => Auth::user()->data
            ]));

        return \response(json_encode([
            'code' => 'err'
        ]));
    }

    public function logout()
    {
        Auth::logout();
    }
}
