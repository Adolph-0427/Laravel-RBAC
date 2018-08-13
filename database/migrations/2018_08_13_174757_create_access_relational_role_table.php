<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessRelationalRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_relational_role', function (Blueprint $table) {
            //
            $table->integer('rid')->comment('角色ID');
            $table->integer('aid')->comment('权限ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access_relational_role', function (Blueprint $table) {
            //
        });
    }
}
