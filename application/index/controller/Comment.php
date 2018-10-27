<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\30 0030
 * Time: 14:26
 */

namespace app\index\controller;


class Comment extends Common
{

    /**发表评论
     * @param $aid  查看的当前文章ID
     * @return \think\response\View
     */
    public function index($aid){
//        $a =Session::get('loginnane','tpblog');
//        if ($a){
            if (request()->isPost()){
                $data=input('post.');
                $name=db('admin')->where('username',session('loginname','','tpblog'))->field('username')->find();
                $data=[
                    'nickname'=>$name['username'],
                    'createdat'=>time(),
                    'createdip'=>gethostbyname($_SERVER['SERVER_NAME']),
                    'content'=>$data['content'],
                    'articleid'=>$aid
                ];
                db('comment')->insert($data);
                $this->redirect('comment/commlist',['aid' => $aid]);
//                return json(['msg'=>"评论成功"]);
            }
//            }else{
//            $this->error('',"/index/login/index");
//        }
        return view();
    }

    /**查看评论
     * @param $id
     */
    public function commlist($aid){
        $comm=db('comment')->where('articleid',$aid)->order('createdat Desc')->limit(6)->select();
        // $gitid=db('admin')->where('usernanme',$comm['nickname'])->select();
        $this->assign('comm',$comm);
        return view();
    }
}