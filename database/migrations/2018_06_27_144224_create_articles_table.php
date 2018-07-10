<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->comment('标题');
            $table->string('describe', 150)->comment('描述');
            $table->string('cover_img')->comment('封面图');
            $table->tinyInteger('is_hot')->comment('是否为热门 1是 0不是');
            $table->integer('views')->comment('浏览量');
            $table->timestamp('publication_time')->comment('发表时间 不填为立即发布');
            $table->tinyInteger('status')->comment('状态 0未发布 1待审核 2已发布');
            $table->tinyInteger('category_id')->comment('分类ID');
            $table->integer('sort')->comment('排序');
            $table->integer('user_id')->unsigned()->comment('用户id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('articles');
    }

}
