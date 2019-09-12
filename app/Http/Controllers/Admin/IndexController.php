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
use App\Models\Music;
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
            'cover'=>$request->cover ?? '',
            'desc'=>$request->desc ?? ''
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
            return $this->output($data, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }
    }

    public function delete(ArticleIdRequest $request)
    {
        $data=Article::where('id',$request->id)->delete();
        return $this->output($data, '请求成功', STATUS_OK);
    }

    public function setHot(ArticleIdRequest $request)
    {
        $is_hot=$request->is_hot;
        $data=Article::where('id',$request->id)->update(['is_hot'=>$is_hot]);
        return $this->output($data, '请求成功', STATUS_OK);
    }


    //添加音乐信息
    public function addMusic(Request $request)
    {
        $params=[
            'name'=>$request->name,
            'author'=>$request->author,
            'music_id'=>$request->music_id,
        ];
        $addMusic=Music::updateOrCreate(['id' => $request->id],$params);
        if($addMusic){
            return $this->output(null, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }
    }

    //上传音乐
    public function uploadMusic(Request $request)
    {

        $path = $request->file('music')->store('public/music');
        $path= Storage::url($path);

        return $this->output($path, '请求成功', STATUS_OK);
    }
}
