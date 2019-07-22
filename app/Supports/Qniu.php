<?php
namespace App\Supports\Qniu;

// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;

class Qniu
{
    private $accessKey;
    private $secretKey;
    private $bucket;

    public function __construct($bucket='')
    {
        // 需要填写你的 Access Key 和 Secret Key
        $this->accessKey = config('qiniu.Access_Key');
        $this->secretKey = config('qiniu.Secret_Key');
        //要上传的空间
        $this->bucket = $bucket?$bucket:config('qiniu.bucket');
    }
    //上传单张图片
    /*
     * $file post过来的文件详情
     * */
    public function upload_file($file,$path = '')
    {
        // 构建鉴权对象
        $auth = new Auth($this->accessKey, $this->secretKey);
        // 生成上传 Token
        $token = $auth->uploadToken($this->bucket);
        // 要上传文件的本地路径或临时目录
        $filePath = $file;
        // 上传到七牛后保存的文件名
        //$extension = pathinfo($file['name']);
        $key = $path . toDate(time(), 'Ym/d') . '/'.rand(1111,9999).time().'.jpeg';
        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err !== null) {
            return ['status' => 'error', 'data' => $err];
        } else {
            return ['status' => 'success', 'data' => $ret];
        }
    }
}