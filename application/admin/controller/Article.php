<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\27 0027
 * Time: 16:18
 */

namespace app\admin\controller;
use think\Request;
use \app\admin\model\Article as ArtiModel;
class Article extends Common
{
    /**文章列表
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index(){
        $data=db('article')
            ->alias('a')
            ->join('category b','a.categoryid=b.categoryid')
            ->order('sort Desc ,articleid Asc')
            ->field('a.*,b.name,b.categoryid')
            ->where('a.categoryid=b.categoryid')
            ->select();
        $this->assign('data',$data);
        return view();
    }

    /**文章添加
     * @return \think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function add(Request $request){


        if (request()->isPost()){
            $data=input('post.');
            unset($data['image']);
            // echo "<pre>";
            // print_r($data);
            // exit;
            $validate=validate('Article');
            if (!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $data['createdat']=time($data['createdat']);
            // $data['images']=md5($data['images']);
                unset($data['__token__']);
            $ser=db('article')->insert($data);
            if (!$ser){
                $this->error('添加失败');
            }else{
                db('category')->where('categoryid',$data['categoryid'])->setInc('total');
                $this->success('添加成功');
            }
        }
        $db=db('category')->select();
        $this->assign('cate',$db);
        return view();
    }

    /**修改文章
     * @param $id //当前文章id
     * @param $cateid  //当前文章修改前 所在的文章分类的id
     * @return \think\response\View
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */

    public function edit($id,$cateid){
        if (request()->isPost()){
            $data=input('post.');
            unset($data['image']);
            $validate=validate('Article');
            if (!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $data['createdat']=strtotime($data['createdat']);
            $data['updateat']=time();
            if (!isset($data['status'])){
                $data['status']=0;
            }
            $data['status']=$data['status'];
            unset($data['__token__']);
            //写入数据库中
            $ser_article=db('article')->where('articleid',$id)->update($data);
            if (!$ser_article){
                $this->error('修改失败');
            }
            //减去当前文章所在分类的文章的数量
            db('category')->where('categoryid',$cateid)->setDec('total');
            //增加当前文章所在文章分类的数量
            db('category')->where('categoryid',$data['categoryid'])->setInc('total');
            $this->success('修改成功');
        }
        $res = db('article')->where('articleid',$id)->find();  // 获取当前管理员的数据
        $db=db('category')->select();//获取文章分类列表信息
        $this->assign([
            'arti'=>$res,
            'cates'=>$db
        ]);
        return view();
    }


    public function sort(){
        if (request()->isPost()){
            $data=input('post.');
            // echo "<pre>";
            // print_r($data);
            // exit;
            if (ArtiModel::sort($data)){
                $this->success('操作成功');
            }
            $this->error('操作异常');
        }
    }



    /**删除文章
     * @param $id
     * @param $cateid
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del($id,$cateid){
        db('article')->where('articleid',$id)->delete();
        db('category')->where('categoryid',$cateid)->setDec('total');
        $this->success('删除成功');
    }
}