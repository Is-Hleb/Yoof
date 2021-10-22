<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ToUserLetter;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        try{
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
}
