<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/7/30
 * Time: 14:55
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SendEmailRequest;
use App\Jobs\Queue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{

    public function login()
    {
        $credentials = request([ 'email', 'password' ]);
        if (!$token = auth('admin')->attempt($credentials)) {
            return $this->output(null, '该账户不存在', ERR_REQUEST);
        }

        return $this->output($token, '请求成功', STATUS_OK);
    }


    public function sendEmail(SendEmailRequest $request)
    {
        //注册发送邮件
        $email=$request->email;
        $this->dispatch(new Queue($email));
        return $this->output(null, '等待验证', STATUS_OK);

    }

    public function register(RegisterRequest $request)
    {
        $data = [
            'email'       => $request->email,
            'password'    => bcrypt($request->password),
            'verify_code' => $request->verify_code,
        ];
//        获取验证码
        if (Redis::get($request->email) == $request->verify_code) {
            DB::beginTransaction();
            unset($data['verify_code']);
            $user = User::create($data);
            $token = JWTAuth::fromUser($user);
        } else {
            //注册发送邮件
            $this->dispatch(new Queue($request->emai));
        }
        if ($user && $token) {
            DB::commit();
            return $this->output($token, '请求成功', STATUS_OK);
        } else {
            DB::rollBack();

            return $this->output(null, '请求失败', ERR_REQUEST);
        }

    }
}