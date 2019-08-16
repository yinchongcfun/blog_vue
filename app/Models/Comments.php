<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:56
 */

namespace App\Models;


class Comments extends BaseModel
{
    protected $guarded = [];

    protected $table = 'comments';

    public function replay()
    {
        return $this->hasMany(Replay::class,'comment_id','id');
    }
}