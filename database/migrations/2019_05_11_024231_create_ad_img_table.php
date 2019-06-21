<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_img', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('article_id')->comment('文章id');
            $table->string('img')->default('')->comment('广告大图');
            $table->boolean('status')->default('1')->comment('0删除，1存在');
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
        Schema::dropIfExists('ad_img');
    }
}
