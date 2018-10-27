<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\7\28 0028
 * Time: 14:32
 */

namespace app\admin\model;


use think\Model;

class Article extends Model
{
    //文章排序
   public static function sort($data){
       foreach ($data as $id=>$sort){
           self::where('articleid',$id)->update(['sort'=>$sort]);
       }
       return true;
   }

}