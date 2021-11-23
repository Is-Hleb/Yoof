<?php

namespace App\Http\Controllers;

use App\Models\SocialToken;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @param $driver
     * @param $email
     * @return RedirectResponse
     */
    private function redirectToRegPage($driver, $email): RedirectResponse
    {
        return redirect()->route('register', '#/')
            ->with(['data' => [
                'user' => [
                    'email' => $email,
                ],
                'data' => [],
                'driver' => $driver
            ]]);
    }

    private function redirectToApp()
    {
        return redirect()->route('app', '#/');
    }

    public function redirect($driver)
    {
        try {
            return Socialite::driver($driver)->redirect();
        } catch (\Exception $exception){
            dd($exception);
            return $this->redirectToApp();
        }
    }

    public function login($driver)
    {
        try {
            $netUser = Socialite::driver($driver)->user();
            $token = SocialToken::where('token', $netUser->getId())->first();
            if($token) {
                $user = $token->user;
                Auth::login($user);
            } else {
                Session::put('driver', $driver);
                Session::put('token', $netUser->getId());
                return $this->redirectToRegPage($driver, $netUser->getEmail());
            }
        } catch (\Exception $exception) {
            dd($exception);
            return $this->redirectToApp();
        }
    }

}
