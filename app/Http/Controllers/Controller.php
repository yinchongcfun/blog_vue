<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function output($data = [], $msg = "ok", $code = 200, $status = 200, array $headers = [], $options = 0)
    {
        return response()->json(compact('msg', 'code', 'data'), $status, $headers, $options);
    }
}
