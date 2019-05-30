<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:41
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;


class IndexController extends Controller
{

    public function index()
    {
        return view('index');
    }

}