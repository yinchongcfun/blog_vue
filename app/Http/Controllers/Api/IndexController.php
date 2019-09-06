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
use App\Models\Music;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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

        $path = $request->file('file')->store('public/imgs');
        $path= Storage::url($path);

        return $this->output($path, '请求成功', STATUS_OK);
    }

    //音乐列表
    public function musicList(Request $request)
    {
        $musicList=Music::select('*')->paginate();
        if($musicList){
            return $this->output($musicList, '请求成功', STATUS_OK);
        }else{
            return $this->output(null, '请求失败', ERR_REQUEST);
        }
    }

}

