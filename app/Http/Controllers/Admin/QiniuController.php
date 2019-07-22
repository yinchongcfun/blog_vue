<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/14
 * Time: 9:38
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Qiniu\Auth;

class QiniuController extends Controller
{
    /**
     * 前端上传图片token
     */
    public function uploadtoken()
    {
        $auth = new Auth(config('qiniu.Access_Key'), config('qiniu.Secret_Key'));
        $policy = [
            'returnBody' => '{"key": $(key), "hash": $(etag), "w": $(imageInfo.width), "h": $(imageInfo.height)}',

        ];
        $strictPolicy = true;
        $bucket = config('qiniu.bucket');
        $uptoken = $auth->uploadToken($bucket, null, 3600, $policy, $strictPolicy);
        return $this->output([ "uptoken" => $uptoken ], '请求成功');
    }

}