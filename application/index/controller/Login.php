<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\31 0031
 * Time: 9:18
 */

namespace app\index\controller;


use think\Controller;
use think\Cookie;

class Login extends Controller
{

    /**
     * @return \think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function index(){
        if (request()->isPost()){
            $data=input('post.');
            Cookie::delete('name','think_');
            $res=db('admin')->where('username',$data['username'])->find();
            if (!$res){
                $this->error('用户不存在，请注册','');
            }
            if (md5($data['password'])!=$res['password']){
                $this->error('密码输入不正确');
            }
            db('admin')->where('username',$data['username'])->update([
                'loginat'=>time(),
                'loginip'=>gethostbyname($_SERVER['SERVER_NAME'])
            ]);
            session('loginname',$res['username'],'tpblog');
            session('loginid',$res['adminid'],'tpblog');
            Cookie::init(['prefix'=>'think_','expire'=>3600,'path'=>'/']);
            Cookie::set('name',$res['adminid'],3600);
            $this->success('登录成功','index/index');
        }
        if (session('loginname','','tpblog') && session('loginid','','tpblog')){
            $this->redirect('index');
        }
        return view();
    }


    public function loginout(){
        session(null,'tpblog');//清除“admin"这个作用域下的session。
        Cookie::delete('name','think_');
        $this->success('退出登录成功','index/index','','3');
    }
}