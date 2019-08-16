<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/31
 * Time: 16:16
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;


class IndexController extends Controller
{
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


    public function uploadImg(Request $request)
    {
        $path = $request->file('img')->store('imgs');

        return $this->output($path, '请求成功', STATUS_OK);
    }
}