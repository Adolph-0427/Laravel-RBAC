<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('类别名称');
            $table->string('identify')->comment('类别标识');
            $table->string('describe')->comment('类别描述');
            $table->tinyInteger('status')->default(1)->comment('1 启用 0禁用');
            $table->tinyInteger('pid')->comment('父级ID');
            $table->tinyInteger('level')->comment('级别');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_category');
    }
}
