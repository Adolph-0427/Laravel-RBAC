<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRelationalRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_relational_role', function (Blueprint $table) {
            //
            $table->integer('uid')->comment('用户ID');
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
        Schema::table('user_relational_role', function (Blueprint $table) {
            //
        });
    }
}
