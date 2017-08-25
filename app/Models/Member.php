<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //指定表
    protected $table = 'members';

    //指定主键
    protected $primaryKey = 'id';

    //时间戳 自动维护 created_at updated_at
    public $timestamps = true;

    //设置白名单
    protected $fillable = ['name','email','password','remember_token'];


}
