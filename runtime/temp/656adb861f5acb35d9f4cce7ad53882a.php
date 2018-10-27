<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\tpblog\public/../application/index\view\index\querys.html";i:1536390615;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>搜索结果</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
</head>
<body class="layui-layout-body" style="padding:10px 10px;margin-bottom:50px;">
<div class="layui-container">
 
    <?php if(is_array($querys) || $querys instanceof \think\Collection || $querys instanceof \think\Paginator): if( count($querys)==0 ) : echo "" ;else: foreach($querys as $key=>$vo): ?>
    <tr><td><span>昵称</span><?php echo $vo['nickname']; ?></td></tr> </br> 
    <tr><td><span>评论时间</span><?php echo $vo['createdat']; ?></td></tr></br>
    <tr><td><span>评论IP</span><?php echo $vo['createdip']; ?></td></tr></br>
    <tr><td><span>文章ID</span><?php echo $vo['articleid']; ?></td></tr></br>
    <tr><td><span>评论内容</span><?php echo $vo['content']; ?></td></tr></br>
        <?php if(is_array($artic) || $artic instanceof \think\Collection || $artic instanceof \think\Paginator): if( count($artic)==0 ) : echo "" ;else: foreach($artic as $key=>$v): ?>
        <tr><td><span>文章标题</span><?php echo $v['title']; ?></td></tr></br>
        <tr><td><span>文章介绍</span><?php echo $v['description']; ?></td></tr></br>
        <tr><td><span>文章正文</span><?php echo $v['content']; ?></td></tr></br>
            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): if( count($cate)==0 ) : echo "" ;else: foreach($cate as $key=>$vi): ?>
                <tr><td><span>分类名称</span><?php echo $vi['name']; ?></td></tr></br>
            <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
</br>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<script src="/static/admin/vendor/js/jquery.js"></script>
<script src="/static/admin/vendor/layui/layui.js"></script>
<script src="/static/admin/custom/js/admin.js"></script>

<script>
    //Demo
    layui.use(['form','element'], function(){
        var form = layui.form;
        var element = layui.element;
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