<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionalOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('functional_operation', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('name')->comment('操做名称');
            $table->string('coding')->comment('操作编码');
            $table->string('url')->comment('拦截URL前缀');
            $table->integer('pid')->comment('父级ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('functional_operation', function (Blueprint $table) {
            //
        });
    }
}
