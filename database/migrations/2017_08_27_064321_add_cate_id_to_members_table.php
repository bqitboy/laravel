<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCateIdToMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('members', function (Blueprint $table) {

            $table->integer('cate_id')->unsigned(); //新增字段
            //$table->foreign('cate_id')->references('id')->on('member_categorys'); //添加索引

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('members', function (Blueprint $table) {

            //$table->dropForeign('cate_id'); // 移除索引
            $table->dropColumn('cate_id'); //删除字段

        });
    }
}
