<?php

namespace App\Http\Controllers\Api;

trait BaseApiController
{
    public function success($data = [])
    {
        return \response([
            'code' => 'success',
            'data' => $data
        ]);
    }

    public function error($data = [])
    {
        return \response([
           'code' => 'err',
           'data' => $data
        ]);
    }
}
