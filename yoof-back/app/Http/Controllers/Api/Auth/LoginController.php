<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        $data = $validator->safe()->toArray();
        if(!Auth::attempt($data)) {
            return response(['register']);
        }
        Auth::user()->api_token = Str::random(60);
        Auth::user()->save();
        return response(['user' => Auth::user(), 'token' => Auth::user()->api_token]);
    }
}
