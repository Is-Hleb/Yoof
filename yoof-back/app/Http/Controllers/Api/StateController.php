<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


class StateController extends Controller
{
    use BaseApiController;
    public function index() {
        return $this->success([
            'user' => \App\Http\Controllers\Api\AuthUser::getUserState(),
        ]);
    }
}
