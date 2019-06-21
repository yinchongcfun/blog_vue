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

    public function phpinfo()
    {
        echo phpinfo();
    }


    public function test(Request $request)
    {
        return view('test');#在你的视图文件夹创建test.blade.php
    }

    public function test2(Request $request)
    {
        return 'Hello World2:' . $request->get('name');
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
}