<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\7\28 0028
 * Time: 14:32
 */

namespace app\admin\model;


use think\Model;

class Category extends Model
{
    //文章排序
   public static function sort($data){
       foreach ($data as $cateid=>$sort){
           self::where('categoryid',$cateid)->update(['sort'=>$sort]);
       }
       return true;
   }

}