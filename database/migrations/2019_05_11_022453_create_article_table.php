<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->comment('分类id');
            $table->string('title')->default('')->comment('文章标题');
            $table->string('content')->default('')->comment('文章内容');
            $table->string('img')->default('')->comment('封面图');
            $table->integer('sort')->default('0')->comment('排序');
            $table->boolean('status')->default('1')->comment('0删除，1存在');
            $table->boolean('is_hot')->default('0')->comment('0非热门，1热门');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
