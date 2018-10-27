<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\27 0027
 * Time: 10:12
 */

namespace app\admin\controller;
use \app\admin\model\Category as CateModel;

class Category extends Common
{
    /**列表显示
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index(){
        $date=db('category')->order('sort Desc ,categoryid Asc')->select();
        $this->assign('cate',$date);
        return view();
    }

    /**文章分类添加
     * @return \think\response\View
     */
    public function add(){
        if (request()->isPost()){
            $data=input('post.');
            dump($data);
            $validate=validate('Category');
            if (!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $db=db('category')->where('name',$data['catename'])->find();
            if($db){
                $this->error('该文章分类已存在');
            }
            if (!isset($data['isnav'])){
                $data['isnav']=0;
            }
            $data['isnav']=$data['isnav'];
            $ser_data=[
                'name'=>$data['catename'],
                'isnav'=>$data['isnav'],
                'total'=>$data['total'],
                'sort'=>$data['sort']
            ];
            unset($data['__token__']);
            $ser=db('category')->insert($ser_data);
            if (!$ser){
                $this->error('添加失败，位置的错误');
            }
            $this->success('添加成功','category/index');
        }
        return view();
    }

    /**编辑文章分类
     * @return \think\response\View
     */
    public function edit($id){
        if (request()->isPost()){
            $data=input('post.');
            // dump($data);die;
            $name=isset($data['catename']);
                unset($name);
            if (!isset($data['isnav'])){
                $data['isnav']=0;
            }
            $data['isnav']=$data['isnav'];
            $ser_data=[
                'isnav'=>$data['isnav'],
                'total'=>$data['total'],
                'sort'=>$data['sort']
            ];
            $ser=db('category')->where('categoryid',$id)->update($ser_data);
            if (!$ser){
                $this->error('编辑失败');
            }
            $this->success('编辑成功','category/index');
        }


        $res = db('category')->where('categoryid',$id)->find();  // 获取当前管理员的数据
        $this -> assign('data',$res);
        return view();
    }

    /**更新列表
     * 
     */
    public function sort(){
        if (request()->isPost()){
            $data=input('post.');
            // echo "<pre>";
            // print_r($data);
            // exit;
            if (CateModel::sort($data)){
                dump($data);die;
                $this->success('操作成功');
            }
            $this->error('操作异常');
        }
    }

    /**删除文章分类
     * @param $id
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del($id){
        $data=db('category')->where('categoryid',$id)->find();
        if ($data['total']>=1){
            $this->success('当前分类中有文章，不能删除');
        }
        db('category')->where('categoryid',$id)->delete();
        $this->success('删除成功');
    }
}