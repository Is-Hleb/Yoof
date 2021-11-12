<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ToUserLetter;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function sendEmailToUser(Request $request)
    {
        try {
            $user = User::where('id', $request->post('id'))->first();
        } catch (\Exception $e) {
            return response([
                'code' => 'err'
            ]);
        }

        $objDemo = new \stdClass();

        $objDemo->sender = 'Yoof Admin';
        $objDemo->receiver = $user->data->name . ' ' . $user->data->surname;
        $objDemo->message = $request->post('message');

        try {
            Mail::to($user->email)->send(new ToUserLetter($objDemo));
            return \response([
                'code' => 'success',
            ]);
        } catch (\Exception $e) {
            return response([
                'code' => 'err',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function changeStatus(Request $request)
    {
        $data = $request->post();
        $validator = Validator::make($data, [
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return \response([
                'code' => 'err',
                'data' => $validator->errors()
            ]);
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return \response([
                'code' => 'err',
                'data' => ['USER' => 'Такого пользователя не существует']
            ]);
        }

        if($user->id == Auth::id()) {
            return \response([
                'code' => 'err',
                'data' => ['USER' => 'Это вы себя удалить пытаетесь?']
            ]);
        }
        $roleBefore = $user->role;
        $user->role = $user->role == 'admin' ? 'user' : 'admin';
        $user->save();

        $str = 'Вы сменили роль ' . $user->email . ' с ' . $roleBefore . ' на ' . $user->role;
        return \response([
            'code' => 'success',
            'data' => ['USER' => $str]
        ]);


    }

}
