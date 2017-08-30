<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    //引用软删除
    use SoftDeletes;
    //指定表
    protected $table = 'members';

    //指定主键
    protected $primaryKey = 'id';

    //时间戳 自动维护 created_at updated_at
    public $timestamps = true;

    //设置白名单
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'cate_id'];

    //设置黑名单 设置空数组表示接受所有数据
    //protected $guarded = [];

    //增加软删除 deleted_at
    protected $dates = ['deleted_at'];
}
