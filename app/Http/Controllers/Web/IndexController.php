<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:41
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Jobs\Queue;
use App\Models\Article;

class IndexController extends Controller
{

    public function index()
    {
        $data=Article::get();
        foreach ($data as $item) {
            $this->dispatch(new Queue($item));
        }
        return response()->json(['code'=>0, 'msg'=>"success"]);
    }
    
    public function AdImg()
    {
        
    }
}