<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\tpblog\public/../application/index\view\article\index.html";i:1540348620;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>查看文章</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
</head>

<body class="layui-layout-body" style="padding:10px 10px;margin-bottom:50px;">
    <div class="layui-container">
        <?php if(is_array($art) || $art instanceof \think\Collection || $art instanceof \think\Paginator): $i = 0; $__LIST__ = $art;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="layui-tab-card" style="width: 100%">
            <div><img src="/<?php echo $vo['images']; ?>" alt=""></div>
            <div class="layui-tab-content">
                <h6 style="color: #009688;font-size: 30px"><?php echo $vo['title']; ?></h6><br>
                <span><?php echo date('Y/m/d H:i',$vo['createdat']); ?></span>&nbsp;&nbsp;<span><i class="layui-icon" style="color: red">&#xe756;</i><?php echo $vo['hits']; ?></span>
                <hr class="layui-bg-black" style="width: 40%;">
            </div>
            <div class="layui-card-body" style="padding: 10px">
                <?php echo $vo['content']; ?>
            </div>
            <a href="<?php echo url('comment/commlist',['aid'=>$vo['articleid']]); ?>">查看评论</a>
            <a href="<?php echo url('comment/index',['aid'=>$vo['articleid']]); ?>">评论</a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

    <script src="/static/admin/vendor/js/jquery.js"></script>
    <script src="/static/admin/vendor/layui/layui.js"></script>
    <script src="/static/admin/custom/js/admin.js"></script>

    <script>
        //Demo
        layui.use(['form', 'element'], function () {
            var form = layui.form;
            var element = layui.element;
            //监听提交
            form.on('submit(formDemo)', function (data) {});
        });
        $(function () {
            $(window.parent.document).find('#righttitle').text($('title').text());
        });
    </script>
</body>

</html>