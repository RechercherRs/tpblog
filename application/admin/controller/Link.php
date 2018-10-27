<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\28 0028
 * Time: 18:57
 */

namespace app\admin\controller;


class Link extends Common
{
    public function index(){
        $data=db('link')->order('sort Desc ,status Asc')->select();
        $this->assign('body',$data);
        return view();
    }
    public function add(){
        if (request()->isPost()){
            $data=input('post.');
            $link=db('link')->where('link',$data['link'])->find();
            $name=db('link')->where('name',$data['name'])->find();
            if($link){
                $this->error('该友情链接已存在');
            }
            if($name){
                $this->error('该网站名称已用');
            }
            if (!isset($data['status'])){
                $data['status']=0;
            }
            $data['status']=$data['status'];
            $ser_data=[
                'name'=>$data['name'],
                'link'=>$data['link'],
                'status'=>$data['status'],
                'sort'=>$data['sort']
            ];
            $ser=db('link')->insert($ser_data);
            if (!$ser){
                $this->error('添加失败，未知的错误');
            }
            $this->success('添加成功','link/index');
        }

        return view();
    }

    public function dele($id){
        $res=db('link')->where('linkid',$id)->delete();
        $name=isset($data['catename']);
        if($res){
            $this->success('删除成功','link/index');
        }
        $this->error('删除失败');
    }

    public  function ins($id){
        if (request()->isPost()){
            $data=input('post.');
            if (!isset($data['status'])){
                $data['status']=0;
            }
            $data['status']=$data['status'];
            // dump($data);die;
            $ser=db('link')->where('linkid',$id)->update($data);
            if ($ser){
                $this->success('编辑成功','link/index');   
            }
            $this->error('编辑失败');
        }
        $res = db('link')->where('linkid',$id)->find();  // 
        $this -> assign('linkls',$res);
        return view();
    }

}