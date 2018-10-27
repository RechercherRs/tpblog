<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\29 0029
 * Time: 16:11
 */

namespace app\index\controller;


use think\Controller;

class Body extends Controller
{
    /**文章显示以及评论显示
     * @param $value 前端index页面传递过来的文章类别id
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index($value){
        $data=db('article')
            ->alias('a')
            ->join('category b','a.categoryid=b.categoryid')
            ->field('a.*,b.name')
            ->where('a.categoryid',$value)
            ->select();
        $cate=db('category')->select();
        $this->assign([
            'arti'=>$data,
            'cate'=>$cate
        ]);
//        redirect('body/index')->remember();
        return view();
    }




    public function link(){

        return view();
    }
}