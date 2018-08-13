<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRelationalMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_relational_menu', function (Blueprint $table) {
            //
            $table->integer('aid')->comment('权限ID');
            $table->integer('mid')->comment('菜单ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access_relational_menu', function (Blueprint $table) {
            //
        });
    }
}
