<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\tpblog\public/../application/admin\view\link\add.html";i:1540174870;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加友情链接</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
    <style>
        .layui-form-select dl{z-index: 2}
        #thumb_list{padding-top: 8px}
        #thumb_list img{border: 1px solid #ddd;padding: 3px;border-radius: 5px}
        #thumb_list span{position: relative; display: inline-block;margin-right: 5px}
        #thumb_list span .delimg{position:absolute;right:3px;top:3px;}
    </style>
</head>
<body style="padding:10px 10px;margin-bottom:50px;">

<div class="layui-container">
    <form class="layui-form" action="?" method="post" >

        <div class="layui-form-item">
            <label class="layui-form-label">网站名称</label>
            <div class="layui-input-block">
                <input type="text" name="name"  lay-verify="required" placeholder="请输入网站名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">链接地址</label>
            <div class="layui-input-block">
                <input type="text" name="link"  lay-verify="required" placeholder="请输入链接地址" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-inline">
                <input type="checkbox" name="status" value="1" lay-skin="switch" lay-text="已发|未发" checked>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-block">
                <input type="text" name="sort" value="100" required lay-verify="required" autocomplete="off" class="layui-input" style="width: 50px">
            </div>
        </div>
        <!--<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />-->
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">添加</button>
            </div>
        </div>

    </form>
</div>

<script src="/static/admin/vendor/js/jquery.js"></script>
<script src="/static/admin/vendor/layui/layui.js"></script>
<!-- 配置文件 -->
<script type="text/javascript" src="/static/admin/vendor/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/admin/vendor/utf8-php/ueditor.all.js"></script>
<script src="/static/admin/custom/js/admin.js"></script>


<script>
    var ue = UE.getEditor('content',{
        initialFrameWidth:null,
    });
    //Demo
    layui.use(['form'], function(){
        var form = layui.form;
        //监听提交
        form.on('submit(formDemo)', function(data){
        });
    });
    $(function () {
        $(window.parent.document).find('#righttitle').text($('title').text());
    });
</script>
</body>
</html>