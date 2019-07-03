<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class Queue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        //
        $this->user=$email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $rand_num=$this->random(6,0);
            Redis::set($this->email,$rand_num,60);
            Mail::raw($rand_num,function ($message){
                // 发件人（你自己的邮箱和名称）
                $message->from('1606548133@qq.com', 'cfun');
                // 收件人的邮箱地址
                $message->to($this->email);
                // 邮件主题
                $message->subject('cfun博客注册验证');
            });
        }catch (\Exception $exception) {
            echo json_encode(['code'=>0,'msg'=>$exception->getMessage()]);
        }

    }


    function random($length, $numeric = 0)
    {
        $seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
        $seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
        $hash = '';
        $max = strlen($seed) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $seed{mt_rand(0, $max)};
        }

        return $hash;
    }
}
