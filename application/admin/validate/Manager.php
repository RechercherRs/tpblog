<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\7\8 0008
 * Time: 11:27
 */

namespace app\admin\validate;

use think\ Validate;
class Manager extends Validate
{
    protected $rule     =   [  // 验证规则
        'username'       =>  'require|min:4|unique:admin',     // 账号规则： require是不为空，min是最少几位，unique是唯一性，manager是表名，不需要加表前缀
        'password'      =>  'require|min:6|confirm:repassword', //密码规则：confirem是比较另外一个字段的值，repassword是确认密码
       'code'          =>  'require|captcha',                   // 验证 验证码是否正确
       '__token__'     =>  'require|token'                        //验证是否在重复提交表单


    ];

    protected $message      =   [   // 验证规则对应的每个提示
        'username.require'   =>  '账号不能用空',
        'username.min'       =>  '账号长度不能小于4位',
        'username.unique'    =>  '账号已存在',
        'password.require'  =>  '密码不能用空',
        'password.min'      =>  '密码长度不能小于6位',
        'password.confirm'  =>  '两次密码不一致',
       'code.require'      =>  '验证码不能为空',
       'code.captcha'      =>  '验证码输入不正确',
       '__token__.require'=>'非法提交',
       '__token__.token'   =>'请不要重复提交'
    ];
    //添加需要验证的场景
    protected $scene    = [ //场景验证规则
        'edit'          =>  ['password'],//修改管理员信息时验证
        'login'         =>  ['username'=>'require|min:4','password'=>'require|min:6','code'],//登录时信息验证
        'add'           =>  ['username','password']                 //添加管理员验证
    ];


}