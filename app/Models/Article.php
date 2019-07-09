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
    use Searchable;

    protected $guarded = [];

    protected $table = 'article';

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag', 'article_id', 'tag_id');
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }

}