<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRelationalGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_relational_group', function (Blueprint $table) {
            //
            $table->integer('gid')->comment('组id');
            $table->integer('uid')->comment('用户ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_relational_group', function (Blueprint $table) {
            //
        });
    }
}
