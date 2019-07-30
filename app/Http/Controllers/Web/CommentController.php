<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/7/30
 * Time: 11:04
 */

namespace App\Http\Controllers\Web;


use App\Http\Requests\ArticleIdRequest;
use App\Http\Requests\CommentRequest;
use App\Models\Comments;
use App\Models\Replay;

class CommentController
{

    //评论
    public function comment(ArticleIdRequest $request)
    {
        $insert=[
            'article_id'=>$request->article_id,
            'content'=>$request->contents,
        ];
        $data=Comments::create($insert);
        if($data){
            return $this->output($data, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }
    }

    //回复
    public function replay(CommentRequest $request)
    {
        $insert=[
            'comment_id'=>$request->article_id,
            'content'=>$request->contents,
        ];
        $data=Replay::create($insert);
        if($data){
            return $this->output($data, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }
    }

}