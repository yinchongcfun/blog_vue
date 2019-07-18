<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:41
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleIdRequest;
use App\Models\Article;
use Chenhua\MarkdownEditor\MarkdownEditor;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function phpInfo()
    {
        echo phpinfo();
    }

    public function add(Request $request)
    {

        $content = $request->input('content');
        $params=[
            'title'=>$request->title,
            'content'=>$content,
            'tags'=>$request->tags ?? '',
            'cover'=>$request->cover ?? ''
        ];

        $article=Article::updateOrCreate(['id' => $request->id],$params);
        if($article){
            return $this->output(null, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }

    }


    public function detail(ArticleIdRequest $request)
    {

        $data=Article::where('id',$request->id)->first();
        if($data){
            return $this->output(null, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }
    }

    public function delete(ArticleIdRequest $request)
    {
        $data=Article::where('id',$request->id)->delete();
        return $this->output($data, '请求成功', STATUS_OK);
    }
}