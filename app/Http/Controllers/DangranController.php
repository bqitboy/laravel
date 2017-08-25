<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DangranController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function getMemberList()
    {
        //ORM 查询操作
        //$list = Member::get();
        //dd($list);

        //查询构造器
        //$list = DB::table('members')->where('id','>',5)->get();

        //DB facades
        $sql = 'select * from members where id > ?';
        $val = [ 5 ];
        $list = DB::select($sql,$val);
        dd($list);


    }

    public function addMember()
    {
        //ORM新增
//        $data = [
//            'name'            =>    'dangran3',
//            'email'           =>    'dangran3@qq.com',
//            'password'        =>     bcrypt('111111'),
//            'remember_token'  =>     str_random(10)
//
//        ];

        //$bool = Member::insert($data); 不带时间
        //$bool = Member::create($data);
        //var_dump($bool);

        //查询构造器
        //$bool = DB::table('members')->insertGetId($data);

        //DB facades
        $sql = 'insert into members(name,email,password,remember_token) value(?,?,?,?) ';
        $val = [ 'dangran4', 'dangran4@qq.com', bcrypt('1111111'), str_random(10) ];
        $bool = DB::insert($sql, $val);
        echo $bool;
    }
}
