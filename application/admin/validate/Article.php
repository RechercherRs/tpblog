<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\27 0027
 * Time: 17:49
 */

namespace app\admin\validate;


use think\Validate;

class Article extends Validate
{
    protected $rule =   [
        'title'  => 'require',
        'hits' =>'require|number|checkviews:0',
       '__token__'  =>  'require|token'
    ];

    protected $message  =   [
        'title.require' => '标题不能为空',
        'hits.require' =>'浏览次数不能为空',
        'hits.number' =>'浏览次数必须是数字',
        'hits.checkviews' =>'浏览次数必须大于0',
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