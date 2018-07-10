<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role', function (Blueprint $table) {
            $table->tinyIncrements('role_id')->comment('角色ID');
            $table->string('role_name', 20)->comment('角色名称');
            $table->tinyInteger('status')->default(1)->comment('状态 0 禁用 1开启');
            $table->string('rules')->comment('规则');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
