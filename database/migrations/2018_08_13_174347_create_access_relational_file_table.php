<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRelationalFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_relational_file', function (Blueprint $table) {
            //
            $table->integer('aid')->comment('权限ID');
            $table->integer('fid')->comment('文件ID');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access_relational_file', function (Blueprint $table) {
            //
        });
    }
}
