<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //指定表
    protected $table = 'banners';

    //指定主键
    protected $primaryKey = 'id';

    //时间戳 自动维护 created_at updated_at
    public $timestamps = true;
}
