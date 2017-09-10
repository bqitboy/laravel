<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account', 10)->comment('账号');
            $table->string('password', 80)->comment('密码');
            $table->string('realname', 10)->comment('姓名');
            $table->dateTime('last_login')->comment('最后登陆时间');
            $table->macAddress('last_ip')->comment('最后登陆ip');
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
        Schema::dropIfExists('accounts');
    }
}
