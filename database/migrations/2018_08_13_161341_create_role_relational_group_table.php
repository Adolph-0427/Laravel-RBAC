<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleRelationalGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_relational_group', function (Blueprint $table) {
            //
            $table->integer('gid')->comment('用户组ID');
            $table->integer('rid')->comment('角色ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_relational_group', function (Blueprint $table) {
            //
        });
    }
}
