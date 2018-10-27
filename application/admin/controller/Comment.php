<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\28 0028
 * Time: 18:32
 */

namespace app\admin\controller;


class Comment extends Common
{
    /**
     * @return \think\response\View
     */
    public function index(){
        $comm=db('comment')
            ->alias('a')
            ->join('article b','b.articleid=a.articleid')
            ->field('a.*,b.title')
            ->where('b.articleid=a.articleid')
            ->select();
        $this->assign('list',$comm);
        return view();
    }
}