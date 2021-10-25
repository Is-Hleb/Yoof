<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class AuthUser extends Controller
{
    public static function getUserState()
    {
        if (Auth::check())
            return [
                'user' => Auth::user(),
                'token' => Auth::user()->api_token,
                'data' => Auth::user()->data
            ];
        else
            return [
                'user' => null,
                'token' => '',
                'data' => null,
            ];
    }

    public function token()
    {
        if (Auth::user())
            return \response(json_encode([
                'api_token' => Auth::user()->api_token,
                'code' => 'success'
            ]));

        return \response(json_encode([
            'api_token' => null,
            'code' => 'err'
        ]));
    }

    public function user()
    {
        if (Auth::user())
            return \response(json_encode([
                'user' => Auth::user(),
                'data' => Auth::user()->data
            ]));

        return \response(json_encode([
            'code' => 'err'
        ]));
    }

    public function isAuth()
    {
        if (Auth::user()) {
            return \response([
                'code' => 'success'
            ]);
        }
        return \response([
            'code' => 'err'
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
