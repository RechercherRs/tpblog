<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\2 0002
 * Time: 18:02
 */

namespace app\admin\validate;


use think\Validate;

class Category extends Validate
{
    protected $rule =   [
        'catename'  => 'require',
        'total' =>'require|number',
       '__token__'  =>  'require|token'
    ];

    protected $message  =   [
        'catename.require' => '名称不能为空',
//        'catename.unique'=>'该分类名已存在',
        'total.require' =>'文章总数不能为空',
        'total.number' =>'文章总数必须是数字',
       '__token__.require'=>'非法提交',
       '__token__.token'   =>'请不要重复提交',
    ];

    /**
     * 自定义验证规则
     * @param $value    要验证字段的值
     * @param $rule     验证 规则传过来的值
     * @return bool     true: 认证通过 ，false/字符串：验证不通过
     */
    protected function checkviews($value,$rule){
        if ($value>=$rule){
            return true;
        }
        return false;
    }
}