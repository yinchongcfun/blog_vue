<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:41
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Article;
use Chenhua\MarkdownEditor\MarkdownEditor;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    //文章详情
    public function detail(Request $request)
    {
        $article_id=$request->id;
        $data=Article::where('id',$article_id)->first();
        $content= MarkdownEditor::parse($data->content);
        $data=[
            'content'=>$content,
            'data'=>$data,
        ];
        return view('edit',$data);
    }


    //列表
    public function list(Request $request)
    {
        $params=$request->only('is_hot','category_id');
        $hot_article= Article::select('id','title','cover','category_id')
            ->with('category')
            ->with('tags')
            ->where('status',1)
            ->where($params)
            ->paginate(2);
        return $this->output($hot_article, '请求成功', STATUS_OK);
    }

}