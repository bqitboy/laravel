<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->comment(' 轮播图类型：1（场馆），2（教练），3（课程）');
            $table->string('post')->comment('图片路径');
            $table->string('title', 100)->comment('轮播图说明');
            $table->integer('sort')->default(1)->comment('排序');
            $table->string('url')->comment('跳转链接');
            $table->integer('status')->default(1)->comment(' 状态：1（启用），2（禁用）');
            $table->timestamps();
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
        Schema::dropIfExists('banners');
    }
}
