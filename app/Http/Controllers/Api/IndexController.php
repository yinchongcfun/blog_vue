<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/31
 * Time: 16:16
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Chenhua\MarkdownEditor\MarkdownEditor;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    //列表
    public function list(Request $request)
    {
        $params=$request->only('is_hot','category_id');
        $hot_article= Article::select('id','title','cover','category_id')->with('category')->with('tags')
            ->where('status',1)
            ->where($params)
            ->paginate(2);
        return $this->output($hot_article, '请求成功', STATUS_OK);
    }

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

    //分类
    public function category()
    {
        $category= Category::where('status',1)->get();
        return $this->output($category, '请求成功', STATUS_OK);
    }

    //标签
    public function tag()
    {
        $category= Tag::where('status',1)->get();
        return $this->output($category, '请求成功', STATUS_OK);
    }
}