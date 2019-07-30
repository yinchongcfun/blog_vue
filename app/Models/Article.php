<?php
/**
 * Created by PhpStorm.
 * User: cfun
 * Date: 2019/5/11
 * Time: 10:55
 */

namespace App\Models;


use Laravel\Scout\Searchable;

class Article extends BaseModel
{
//    use Searchable;

    protected $guarded = [];

    protected $table = 'article';

    protected $fillable=['title','content','tags','cover'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }

    public function comment()
    {
        return $this->hasMany(Comments::class, 'article_id', 'id');
    }

}