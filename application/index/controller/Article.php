<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\31 0031
 * Time: 18:14
 */

namespace app\index\controller;


use think\Controller;

class Article extends Controller
{
    /**查看文章
     * @param $id 前端body传递过来的文章id
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index($id){
        $use=db('article')->where('articleid',$id)->select();
            if (session('hits')!=md5($id)){
                db('article')->where('articleid',$id)->setInc('hits');
                session('hits',md5($id));
            }
        $this->assign('art',$use);

        return view();
    }
}