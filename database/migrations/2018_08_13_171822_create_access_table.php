<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('access', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->tinyInteger('type')->comment('1菜单 2页面元素 3文件');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access', function (Blueprint $table) {
            //
        });
    }
}
