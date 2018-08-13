<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRelationalPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_relational_page', function (Blueprint $table) {
            //
            $table->integer('aid')->comment('权限ID');
            $table->integer('pid')->comment('页面元素ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access_relational_page', function (Blueprint $table) {
            //
        });
    }
}
