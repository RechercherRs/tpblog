<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\tpblog\public/../application/index\view\body\index.html";i:1540349331;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>查看文章列表</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
    <style>
        span {
            font-size: 12px
        }

        #hidden div {
            display: block;
        }
    </style>
</head>

<body class="layui-layout-body" style="padding:10px 10px;margin-bottom:50px;">
    <div class="layui-container">
        <?php if(is_array($arti) || $arti instanceof \think\Collection || $arti instanceof \think\Paginator): $i = 0; $__LIST__ = $arti;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="layui-tab-card" style="width: 100%;margin:10px;">
            <div>
                <a href="<?php echo url('article/index',['id'=>$vo['articleid']]); ?>"><img src="/<?php echo $vo['images']; ?>" alt=""></a>
                <div class="layui-tab-content" style="font-size: 18px"><a href="<?php echo url('article/index',['id'=>$vo['articleid']]); ?>"
                        style="color: #009688"><?php echo $vo['title']; ?></a><br>
                    <span><?php echo date('Y/m/d H:i',$vo['createdat']); ?></span>&nbsp;&nbsp;<span><i class="layui-icon" style="color: red">&#xe756;</i><?php echo $vo['hits']; ?></span>&nbsp;&nbsp;<span><?php echo $vo['name']; ?></span>
                    <hr class="layui-bg-black" style="width: 40%;">
                </div>
                <div class="layui-card-body" style="padding: 10px">
                    <?php echo $vo['content']; ?>
                </div>
                <br>
                
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
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