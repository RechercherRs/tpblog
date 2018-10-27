<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\25 0025
 * Time: 15:56
 */

namespace app\admin\controller;

use think\Controller;
use think\Cookie;
class Common extends Controller
{
    /**登录状态验证
     * @return \think\response\View
     */
    public function _initialize(){
        parent::_initialize();//继承父类的初始化方法
        //登录状态验证
        if (!session('loginname','','tpblog') || !session('loginid','','tpblog')){
            Cookie::delete('name','think_');
            $contrller=request()->controller(); //controller():设置或者获取当前的控制器名
            $action=request()->action();        //action():设置或者获取当前的操作名
            if ($contrller==="Index"&&$action==="index"){//检测当前访问的URL地址路径是什么，然后做出跳转。
            
                $this->redirect('/admin/login/index');//URL重定向
            }
            $this->error('没有登录，不允许此操作！','/admin/login/index');
        }
        //获取网站配置信息
//        $configRes=db('config')->find();
//        $config=json_decode($configRes['config'],true);
//        $this->assign('config',$config);
        $id = Cookie::get('name','think_');
        $this->assign('id',$id);
        $this->assign('admin',session('loginname','','tpblog'));
    }

    /**图片上传
     * @return \think\response\Json
     */
    public function upimg(){
        $file=request()->file('image');
        if(empty($file)) {  
            $this->error('请选择上传文件');  
        }
            if ($file){
                $info=$file->move(ROOT_PATH.'public'.DS.'uploads');
                // dump($info);
                $url='uploads\\'.$info->getSaveName();
               return json(['code'=>1,'msg'=>'上传成功','img'=>$url]);
            }else{
                return json(['code'=>0,'msg'=>$file->getError()]);
            }
            
        }
}