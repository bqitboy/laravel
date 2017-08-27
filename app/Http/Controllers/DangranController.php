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

    public function getOne()
    {
        $one = DB::table('members')->orderBy('id','asc')->first();
        dd($one);
    }

    //获取单个字段值
    public function getValue()
    {
        $name = DB::table('members')->where('id',1)->value('name');
        echo $name;
    }

    //获取一列值
    public function getValueList()
    {
        $names = DB::table('members')->pluck('name');
        dd($names);
    }

    //指定查询字段 && 追加字段
    public function getData()
    {
        //$list = DB::table('members')->select('id','name','remember_token')->get();

        //追加查询字段
        $list = DB::table('members')->select('id','name','remember_token');
        $lists = $list->addSelect('password')->get();
        dd($lists);
    }

    //原始表达式
    public function getLists()
    {
//        $list = DB::table('members')
//                    ->select(DB::raw('count(*) as name'))
//                    ->where('id','<>',1)
//                    ->get();

        $list = DB::table('members')
                    ->where('name','like','%1')
                    ->get();
        dd($list);
    }

    //where 条件查询
    public function query1()
    {
        $list = DB::table('members')
                    ->where('id','>=',2)
                    ->get();
        dd($list);
    }

    public function query2()
    {
        $list = DB::table('members')
                    ->where([
                        ['id','>=',4],
                        ['name','like','%dan%']
                    ])
                    ->get();
        dd($list);
    }

    //or语法
    public function query3()
    {
        $list = DB::table('members')
                    ->where('name','like','%h%')
                    ->orWhere('id','>=',3)
                    ->get();
        dd($list);
    }

    //whereBetween && whereNotBetween
    public function query4()
    {
        $list = DB::table('members')
                    ->whereBetween('id',[1,5])
                    ->get();
        dd($list);
    }

    //whereIn && whereNotIn
    public function query5()
    {
        $list = DB::table('members')
                    ->whereIn('id',[1,2,3])
                    ->get();
        dd($list);
    }

    //whereNull && whereNotNull
    public function query6()
    {
        //获取该字段为null到数据列表
        $list = DB::table('members')
                    ->whereNull('updated_at')
                    ->get();
        dd($list);
    }

    //
    public function query7()
    {
        $list = DB::table('members')
                    ->whereDate('created_at', '2017-8-25')
                    ->get();
        dd($list);
    }

    //join
    public function query8()
    {
        $list = DB::table('members')
                    ->join('membercategorys', 'members.cate_id', '=', 'membercategorys.id')
                    ->get();
        dd($list);
    }

    //Eloquent ORM
    













}
