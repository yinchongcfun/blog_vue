<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:57
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\AdImg;
use Illuminate\Support\Facades\Request;


class AdImgController extends Controller
{
    public function addAdImg(Request $request)
    {
        $params=$request->all();
        $add_adimg=AdImg::create($params);
        if($add_adimg){
            return $this->output($add_adimg, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }
    }
}