<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/6/3
 * Time: 15:50
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SendEmailRequest;
use App\Jobs\Queue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', [ 'except' => [ 'login', 'register' ,'sendEmail'] ]);
    }


    public function login(Request $request)
    {
        $credentials = request([ 'email', 'password' ]);
        if (!$token = auth('admin')->attempt($credentials)) {
            return $this->output(null, 'Unauthorized', ERR_REQUEST);
        }
        return $this->output($token, '请求成功', STATUS_OK);
    }


    public function sendEmail(SendEmailRequest $request)
    {
        $email=$request->email;
        //注册发送邮件
        $this->dispatch(new Queue($email));
    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json([ 'message' => 'Successfully logged out' ]);
    }

    /**
     * Refresh a token.
     * 刷新token，如果开启黑名单，以前的token便会失效。
     * 值得注意的是用上面的getToken再获取一次Token并不算做刷新，两次获得的Token是并行的，即两个都可用。
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
        ]);
    }
}