<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @param $regType
     * @param $email
     * @return RedirectResponse
     */
    private function redirectToRegPage($regType, $email): RedirectResponse
    {
        return redirect()->route('register', '#/')
            ->with(['data' => [
                'user' => [
                    'email' => $email,
                ],
                'data' => [],
                'reg_type' => $regType
            ]]);
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookLogin()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->getId())->first();
            if($isUser) {
                Auth::login($isUser);
                return redirect()->route('app', '#/');
            } else {
                /** todo Перенести в отдельный роут с регистрацией, c соц сетей брать только почту, ибо ФИО может быть фейком в соц сетях **/

//                $createUser = [
//                    'email' => $user->getEmail(),
//                    'password' => Str::random(60),
//                    'api_token' => Str::random(60),
//                    'fb_id' => $user->getId(),
//                ];
//                $createdUser = User::create($createUser);
//                $userData = [
//                    'name' => 'null',
//                    'surname' => 'null',
//                    'patronymic' => 'null',
//                    'api_token' => Str::random(60),
//                    'user_id' => $createdUser->id,
//                ];
//                $data = UserData::create($userData);
//                Auth::login($createdUser);
                Session::put('fb_id', $user->getId());
                return $this->redirectToRegPage('fb', $user->getEmail());
            }

        } catch (\Exception $exception) {
            // echo $exception->getMessage();
            return redirect()->route('app', '#/');
        }
    }
}
