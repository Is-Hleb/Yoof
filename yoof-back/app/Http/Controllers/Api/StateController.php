<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index() {
        return \response([
            'user' => \App\Http\Controllers\Api\AuthUser::getUserState(),
        ]);
    }
}
