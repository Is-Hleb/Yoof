<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\CompanyData;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:100',
            'password' => 'required|string',
            'role' => 'required',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        $userToFill = $validator->safe();
        $user = new User([
            'email' => $userToFill['email'],
            'password' => Hash::make($userToFill['password']),
            'role' => $userToFill['role'],
            'api_token' => Str::random(60);
        ]);
        $role = $userToFill['role'];
        $responseData = [
            'user' => $user,
        ];

        if ($role == 'user') {
            $validator = Validator::make($request->all(), [
                'name' => 'required | string',
                'surname' => 'required | string',
                'patronymic' => 'required',
            ]);
            if ($validator->fails()) {
                return $validator->errors();
            }
            $data = $validator->safe();

            $user->save();
            $user_data = UserData::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'patronymic' => $data['patronymic'],
                'user_id' => $user->id
            ]);
            $responseData['data'] = $user_data;
        }

        if ($role == 'company') {
            $validator = Validator::make($request->all(), [
                'name' => 'required | string',
                'legal_address' => 'required | string',
                'inn' => 'required',
                'bank' => 'required',
                'checking_account' => 'required',
                'kpp' => 'required',
                'bank_bik' => 'required',
            ]);

            if ($validator->fails()) {
                return $validator->errors();
            }
            $data = $validator->safe();

            $user->save();
            $data['user_id'] = $user->id;
            $companyData = CompanyData::create($data->toArray());
            $responseData['data'] = $companyData;
        }


        $responseData['token'] = $user->api_token;
        return response($responseData, '200');
    }
}
