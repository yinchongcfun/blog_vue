<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:41
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleIdRequest;
use App\Models\Article;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    //文章详情
    public function detail(ArticleIdRequest $request)
    {
        $article_id=$request->id;
        $data=Article::where('id',$article_id)->first();
        if($data){
            return $this->output($data, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }
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
            ->paginate(4);
        return $this->output($hot_article, '请求成功', STATUS_OK);
    }

    //列表
    public function search(Request $request)
    {
        $params=$request->keyword;
        $article= Article::search($params)->paginate();
        return $this->output($article, '请求成功', STATUS_OK);
    }

}