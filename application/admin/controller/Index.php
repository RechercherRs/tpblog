<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\24 0024
 * Time: 15:59
 */

namespace app\admin\controller;

use think\Db;
use think\Cookie;
use think\Env;
use think\Request;
class Index extends Common
{
    public function index(){
        $id=session('loginid','','tpblog');
        if ($id!=1){
            session(null,'tpblog');//清除“admin"这个作用域下的session。
            Cookie::delete('name');
            $this->success("非管理员禁止访问后台",'login/index');
        }
        return view();
    }

    public function system()
    {
        //获取服务器信息，超全局变量：$_SERVER
        $system=[
            //获取服务器IP地址
            'ip'      =>gethostbyname($_SERVER['SERVER_NAME']),//gethostbyname：用过主机名获取服务器IP地址
            //服务器域名/主机名
            'host'    =>$_SERVER['SERVER_NAME'],
            //服务器操作系统/php_uname
            'os'      =>PHP_OS,
            //运行环境
            'server'  =>$_SERVER["SERVER_SOFTWARE"],
            //服务器端口
            'port'    =>$_SERVER['SERVER_PORT'],
            //PHP版本
            'php_ver' =>THINK_VERSION,
            //mysql版本
            'mysql_ver'=>Db::query('select version() as ver')[0]['ver'],
            //数据库名称
            'database'=>config('database')['database']
        ];
//        $logRes=db('loginlog')->order('loginat desc')->where('adminid',session('loginid','','tpblog'))->limit(6)->select();
//        $this->assign('log',$logRes);
        $data=db('admin')->where('adminid',session('loginid','','tpblog'))->limit(6)->select();

        $this->assign([
            'system'=>$system,
            'data'=>$data
        ]);

        return view();
    }
    public function upload(){

            // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move(Env::get("").DIRECTORY_SEPARATOR. 'public' . DIRECTORY_SEPARATOR . 'uploads');
            if ($info) {
                $url = "http://www.tp5.com/" . $info->getSaveName();
                $data = [
                    "code" => 1,
                    "msg" => '',
                    "data" => ['src' => $url],
                ];
                echo json_encode($data);
            } else {
                // 上传失败获取错误信息
                $data = [
                    "code" => 0,
                    "msg" => $file->getError(),
                    "data" => '',
                ];
                echo json_encode($data);
            }
        }
    }
    public function img(Request $request)
    {
        $arr =  $request->param();
        echo "<pre>";
        print_r($arr);
        exit;
    }
}