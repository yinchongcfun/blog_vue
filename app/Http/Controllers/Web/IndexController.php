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
use App\Models\Category;
use App\Models\Nav;
use Chenhua\MarkdownEditor\MarkdownEditor;
use Illuminate\Http\Request;


class IndexController extends Controller
{

    public function list(Request $request)
    {
        $params=$request->only('is_hot','category_id');
        $hot_article= Article::where('status',1)->where($params)->get();
        return $this->output($hot_article, '请求成功', STATUS_OK);
    }

    public function category()
    {
        $category= Category::where('status',1)->get();
        return $this->output($category, '请求成功', STATUS_OK);
    }

    public function nav()
    {
        $category= Nav::where('status',1)->get();
        return $this->output($category, '请求成功', STATUS_OK);
    }

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
}