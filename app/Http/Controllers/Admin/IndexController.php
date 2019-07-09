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
        $content = $request->input('test-editormd-html-code');
        $params=[
            'content'=>$content,
            'category_id'=>$request->category_id??'',
            'tags'=>$request->tags??''
        ];
        $article=Article::updateOrCreate([ 'id' => $request->id ],$params);
        if($article){
            return $this->output(null, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }

    }


    public function detail(ArticleIdRequest $request)
    {

        $data=Article::where('id',$request->id)->first();
        $content= MarkdownEditor::parse($data->content);
        $data->content=$content??'';
        return $this->output($data, '请求成功', STATUS_OK);
    }
}