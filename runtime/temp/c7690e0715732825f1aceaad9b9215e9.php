<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"D:\tpblog\public/../application/index\view\index\index.html";i:1540350146;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">

</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <a href="/"><div class="layui-logo" style="margin-left: 10%"><span class="layui-hide-xs">ThinkPHP</span>Blog</div></a>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left" style="margin-left: 8%">
            <?php if(is_array($hots) || $hots instanceof \think\Collection || $hots instanceof \think\Paginator): $i = 0; $__LIST__ = $hots;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <li class="layui-nav-item "><a href="<?php echo url('body/index',['value'=>$v['categoryid']]); ?>" target="_content"><?php echo $v['name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <ul class="layui-nav layui-layout-left"  style="margin-left: 50%">
            <form action="<?php echo url('index/querys'); ?>" method="POST">
                <li class="layui-hide-xs" style="margin-top:10px;">
                <input  type="text" name="title"  lay-verify="required" placeholder="" autocomplete="off" class="layui-input" style="border: 0px;border-bottom:white solid 1px; background: none; color: white">  
            </li>
            <li class="layui-nav layui-layout-left" style="margin-top:20px;">
                <button class="layui-btn layui-btn-xs layui-btn-primary" style="border: 0px;background: none;float: left;padding: 0px;">
                    <i class="layui-icon"  style="font-size: 20px; color: white;">&#xe615;</i>
                </button> 
            </li>
            </form>
            
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item layui-hide-xs">
                <a href="<?php echo url('login/index'); ?>">
                    <i class="layui-icon" style="font-size: 1.2rem;">&#xe612;</i>
                    <?php echo $admin; ?>
                </a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <i class="layui-icon" style="font-size: 1.2rem;">&#xe620;</i>
                    设置
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">系统设置</a></dd>
                    <dd><a href="?" target="_content">密码修改</a></dd><!-- target:规定在哪里打开文档链接/_content:插入生成内容-->
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php echo url('login/loginout'); ?>">退出</a></li>
        </ul>
    </div>

    <div class="layui-body layui-tab-card" id="layui-body" style="overflow: hidden;width: 75%;left: 10%;height: 1100%;">
        <!-- 内容主体区域 -->
        <iframe id="_content" name="_content" src="<?php echo url('body/index',['value'=>1]); ?>" scrolling="yes" frameborder="no" width="70%" height="100%"></iframe>
        <div class="layui-body layui-layout-right" style="width: 30%;margin-left: 50%;top: 10px;float:right;">
            <div class="layui-tab-card" style="width: 270px; float: right;">
                <div class="layui-tab-content" style="font-size: 18px;color: #009688">所有分类<br>
                    <hr class="layui-bg-black">
                </div>
                <?php if(is_array($hots) || $hots instanceof \think\Collection || $hots instanceof \think\Paginator): $i = 0; $__LIST__ = $hots;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="layui-card-body" style="padding: 10px">
                    <a href="<?php echo url('body/index',['value'=>$vo['categoryid']]); ?>" target="_content"><?php echo $vo['name']; ?></a><span>（</span><span><?php echo $vo['total']; ?></span>）<span></span>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="layui-tab-card" style="width: 270px; float: right;margin-top: 20px;">
                <div class="layui-tab-content" style="font-size: 18px;color: #009688">友情链接<br>
                    <hr class="layui-bg-black">
                </div>
                <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="layui-card-body" style="padding: 10px">
                    <a href="http://<?php echo $vo['link']; ?>" target="_content"><?php echo $vo['name']; ?></a>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>

    <div class="layui-footer footer footer-doc " style="position:absolute;left:0px;">
        <!-- 底部固定区域 -->
        © ThinkPHPBlog　
        <a href="<?php echo url('/admin/index/index'); ?>">后台登录</a>
    </div>
<script src="/static/admin/vendor/js/jquery.js"></script>
<script src="/static/admin/vendor/layui/layui.js"></script>
<script src="/static/admin/custom/js/admin.js"></script>
<script>
    layui.use('element', function(){
        var element = layui.element;
    });
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
        });
    });
    $(function () {
        $(window.parent.document).find('#righttitle').text($('title').text());
    });
</script>
</div>
</body>
</html>