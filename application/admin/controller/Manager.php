<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\25 0025
 * Time: 14:58
 */

namespace app\admin\controller;


use think\Controller;

class Manager extends Common
{
    /**管理员列表
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index(){
            $ser=db('admin')->select();
            $this->assign('list',$ser);
        return view();
    }

    /**添加管理员
     * @return \think\response\View
     */
    public function add(){
        if (request()->isPost()){
            $data=input('post.');
            $validate=validate('Manager');//调用验证规则
            if (!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            unset($data['repassword']);
            unset($data['__token__']);
            $data['password']=md5($data['password']);
            $insdata=[
                'username'=>$data['username'],
                'password'=>$data['password'],
                'createdat'=>time()
            ];
            if (db('admin')->insert($insdata)){
                $this->success('添加管理员成功','manager/add');
            }else{
                $this->error('出现异常');
            }
        }
        return view();
    }

    /**管理员编辑
     * @param $id
     * @return \think\response\View
     */
    public function edit($id){
        if (request()->isPost()){
            $data=input('post.');
            if (isset($data['username'])){
                unset($data['username']);
            }
            if (!$data['password']){
                unset($data['password']);
                unset($data['repassword']);
            }else{
                $validate=validate('Manager');//验证提交的表单
                if (!$validate->scene('edit')->check($data)){
                    $this->error($validate->getError());
                }
                unset($data['repassword']);
                $data['password']=md5($data['password']);
                $result=db('admin')->where('adminid',$id)->update($data);
                if (!$result){
                    $this->error('修改失败');
                }else{
                    $this->success('修改成功');
                }
            }
        }
        $res = db('admin')->where('adminid',$id)->field('username')->find();  // 获取当前管理员的数据，where是筛选表的行，field是筛选表的列。
        $this -> assign('name',$res);
        return view();
    }

    /**删除管理员
     * @param $id
     */
    public function del($id){
        $ser=db('admin')->where('adminid',$id)->delete();
        if (!$ser){
            $this->error('删除失败');
        }else{
            $this->success('删除成功');
        }
    }

    /**
     * 管理员密码修改
     */
    public function editpsd(){
        if (request()->isPost()){
            $data=input('post.');
            $validate=validate('Manager');//验证提交的表单
            if (!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $ser=db('admin')->field('password')->find(session('loginid','','tpblog'));
            if (md5($data['oldpassword'])!=$ser['password']){
                $this->error('当前密码输入错误');
            }
            $result=db('admin')
                ->where('adminid',session('loginid','','tpblog'))
                ->setField('password',md5($data['password']));
            if (!$result){
                $this->error('更新失败');
            }
            $this->success('更新成功');
        }
        return view();
    }
}