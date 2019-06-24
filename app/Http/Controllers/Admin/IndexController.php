<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:41
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Article;
use Chenhua\MarkdownEditor\MarkdownEditor;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function add(Request $request)
    {
        $content = $request->input('test-editormd-html-code');
        $params=[
            'content'=>$content,
            'category_id'=>$request->category_id??'',
            'tags'=>$request->tags??''
        ];
        $article=Article::create($params);
        if($article){
            return $this->output(null, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }

    }


    public function edit(Request $request)
    {
        $article_id=$request->id;
        $data=Article::where('id',$article_id)->first();
        $content= MarkdownEditor::parse($data->content);
        $data->content=$content??'';
        return $this->output($data, '请求成功', STATUS_OK);
    }
}