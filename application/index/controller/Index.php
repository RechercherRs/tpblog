<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
class Index extends Controller
{

    public function index()
    {
        $data=db('category')->where('isnav',1)->select();
        $link=db('link')->where('status',1)->select();
        $admin=session('loginname','','tpblog');
        $this->assign('admin',$admin);
        $this->assign('link',$link);
        $this->assign('hots',$data);
        return  view();
    }
    public function img(Request $request)
    {
       $arr =  $request->param();
       echo "<pre>";
       print_r($arr);
       exit;
    }

    /**
     * 模糊查询
     */
    public function querys()
    {
        if (request()->isPost()){
            $data=input('post.');
    
            if(empty($data)){
                $this->error('请输入要查询的内容');
            }
            // $sele=Db::query("SELECT * FROM category and article WHERE  LIKE '%$data%'");
            // $sele=db('article a')
            // ->join('category b', 'a.categoryid=b.categoryid')
            // ->join('comment c','c.articleid=a.articleid')
            // ->where('a.title|a.description|a.content|b.name|c.nickname|c.content','like',"%".$data['title']."%")
            // ->select();
                $sele=db('comment')
                ->where('nickname|content','like',"%".$data['title']."%")
                ->select();       
                foreach($sele as $k=>$v){
                    
                    $sele[$k]['artic'] = Db::name('article')->where('articleid',$v['articleid'])->select();

                    foreach($sele[$k]['artic'] as $key=>$val){

                        $sele[$k]['artic'][$key]['cate']=Db::name('category')->where('categoryid',$val['categoryid'])->select();

                    }
                }



            // echo "<pre>";
            // print_r($sele);
            // exit;
            $this->assign('querys',$sele);
            $this->assign('artic',$sele[$k]['artic']);
            $this->assign('cate',$sele[$k]['artic'][$key]['cate']);
        }
        return view();
    }

    public function useradd($getname){
        if(request()->isPost()){
            $datas=input('post.');
            
            // echo "<pre>";
            // print_r($getname);
            // exit;
        }
        return view();
    }
}
