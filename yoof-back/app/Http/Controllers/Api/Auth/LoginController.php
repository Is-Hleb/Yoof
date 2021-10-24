<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = $validator->safe()->toArray();

        if ($validator->fails()) {
            return \response([
                'code' => 'err',
                'errors' => $validator->errors()
            ]);
        }

        $user = User::where('email', $data['email'])->first();
        if(!$user) {
            return \response([
                'code' => 'err',
                'errors' => [
                    'email' => 'Пользователя с такой почтой не существует'
                ]
            ]);
        }


        if (!Hash::check($data['password'], $user->password)) {
            return \response([
                'code' => 'err',
                'errors' => [
                    'Пароль' => 'Вы ввели неправильный пароль'
                ],
            ]);
        }

        if (!$user) {
            return \response([
                'code' => 'err',
                'errors' => $validator->errors(),
                $user
            ]);
        }

        $user->api_token = Str::random(60);
        $user->save();

        Auth::login($user);
        return \response([
            'code' => 'success',
            'user' => Auth::user(),
            'token' => Auth::user()->api_token,
            'data' => Auth::user()->data
        ]);
    }
}
