<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\9\1 0001
 * Time: 11:46
 */

namespace app\index\controller;


use think\Controller;
use think\Session;
class Common extends Controller
{

    public function _initialize()
    {
        parent::_initialize();
        if (!session('loginname','','tpblog') || !session('loginid','','tpblog')){
            $contrller=request()->controller(); //controller():设置或者获取当前的控制器名
            $action=request()->action();        //action():设置或者获取当前的操作名
            if ($contrller==="Comment"&&$action==="commlist"){//检测当前访问的URL地址路径是什么，然后做出跳转。
//                $this->redirect('login/index');//URL重定向

            }
            $this->redirect('index/login/index');
//            $this->error('没有登录，不允许评论！','login/index');
        }
        $id=db('article')->field('articleid')->select();
        $this->assign('id',$id);
    }
}