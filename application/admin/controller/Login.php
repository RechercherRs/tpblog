<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\24 0024
 * Time: 18:18
 */

namespace app\admin\controller;
use think\Controller;
use think\Cookie;

class Login extends Controller
{

    /**登录
     * @return \think\response\View
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function index(){
        if(Cookie::get('name','think_')){
            Cookie::delete('name','think_');
        }
        if (request()->isPost()){
            $data=input('post.');
            $this->logincheck($data);//验证登录信息
            //更新数据库管理员最近登录时间以及ip
            db('admin')->where('username',$data['username'])->update([
                'loginat'=>time(),
                'loginip'=>gethostbyname($_SERVER['SERVER_NAME'])
            ]);
            $this->success('登录成功','index/index');
        }
        if (session('loginname','','tpblog') && session('loginid','','tpblog')){
            $this->redirect('index/index');
        }
        return view();
    }


    /**
     * 登录验证
     */
    protected function logincheck($data){
        $id=db('admin')->where('username',$data['username'])->field('adminid')->find();
        if ($id['adminid']!=1){
            $this->error('非管理员禁止此操作');
        }
        $validata=validate('manager');
        if(!$validata->scene('login')->check($data)){   //tp方法：scenc场景验证/check:数据自动验证。
            $this->error($validata->getError());
            //return ['code'=>0,'msg'=>$validata->getError()];
        }
        //验证用户名在数据库中是否存在；
        $res=db('admin')->where('username',$data['username'])->find();

        //验证密码是否和数据中一致；
        if (md5($data['password'])!=$res['password']){
         // return ['code'=>0,'msg'=>"密码输入不正确",'mid'=>$res['id']];
            $this->error('密码输入不正确');
        }
        //保存登录信息到session
        session('loginname',$res['username'],'tpblog');
        session('loginid',$res['adminid'],'tpblog');
        Cookie::init(['prefix'=>'think_','expire'=>3600,'path'=>'/']);
        Cookie::set('name',$res['adminid'],3600);
        //return ['code'=>1,'msg'=>"登录成功",'mid'=>$res['id']];
    }

    /**
     * 退出登录
     */
    public function logout(){
        session(null,'tpblog');//清除“admin"这个作用域下的session。
        setcookie("name", "", time() - 3600);
        $this->success('退出登录成功','login/index','','1');
    }
}