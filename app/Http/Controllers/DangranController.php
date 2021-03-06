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
        $list = DB::table('members as a')
                    ->select('a.id', 'a.name', 'b.name as member_type')
                    ->join('membercategorys as b', 'a.cate_id', '=', 'b.id')
                    ->get();
        dd($list);
    }

    //Eloquent ORM
    public function query9()
    {
        //$list = Member::all();
        $list = Member::where('id','>',2)
                        ->orderBy('id','desc')
                        ->take(10)
                        ->get();

        dd($list);
    }

    //
    public function query10()
    {
        $one = Member::find(1)->toJson();
        //dd($one);
        return $one;
    }

    //查找不到 抛出异常
    public function query11()
    {
        $one = Member::findOrFail(15);
        dd($one);
    }

    //firstOrCreate 获取第一条数据 不存在 就会创建 并返回结果集
    public function query12()
    {
        $data = [
            'name'     =>   'meinv1',
            'email'    =>   'aaaa1@qq.com',
            'password' =>   bcrypt('213232'),
            'remember_token'  =>  str_random(10),
            'created_at'      =>  date('Y-m-d H:i:s'),
            'cate_id'         =>   1,

        ];
        $first = Member::firstOrCreate($data);

        dd($first);
    }

    //updateOrCreate 存在既更新 不存在 则 写入
    public function dangran1()
    {
        $result = Member::updateOrCreate(
            ['name'=>'meinv1'],
            ['email'=>'aaaa2@qq.com']
        );
        dd($result);

    }

    //delete 删除操作
    public function delete1()
    {
        //DB facade
        //$num = DB::delete('delete from members where id = ?', [ 1 ]);

        //数据查询构造器
        //$num = DB::table('members')->where('id','<','4')->delete();

        //Eloquent ORM
        //$num = Member::where('id','<=',5)->delete();

        //destroy
        $num = Member::destroy([8, 9]);

        echo $num;
    }

    //强制查询被软删除的实例 withTrashed 只查询被软删除的实例
    public function getSoftDeleteList()
    {
        //$list = Member::withTrashed()->get();

        $list = Member::onlyTrashed()->get();
        dd($list);
    }













}
