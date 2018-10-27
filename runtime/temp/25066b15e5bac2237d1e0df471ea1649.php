<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\tpblog\public/../application/admin\view\category\edit.html";i:1540190665;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>编辑文章分类</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
</head>
<body style="padding:10px 10px;margin-bottom:50px;">
<div class="layui-container">
    <form class="layui-form" action="?" method="post" >
        <div class="layui-form-item">
            <label class="layui-form-label">分类名称</label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo $data['name']; ?>" disabled name="catename"  lay-verify="required" placeholder="请输出分类名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否显示在导航栏</label>
            <div class="layui-input-inline">
                <input type="checkbox" name="isnav" value="1" lay-skin="switch" <?php echo !empty($data['isnav'])?"checked":""; ?> lay-text="显示|隐藏">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">文章总数</label>
            <div class="layui-input-inline">
                <input type="text" name="total" value="<?php echo $data['total']; ?>" required lay-verify="required" placeholder="请输入文章总数" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo $data['sort']; ?>" name="sort"  placeholder="请输入排序" autocomplete="off" class="layui-input" style="width: 80px">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">修改</button>
            </div>
        </div>
    </form>
</div>

<script src="/static/admin/vendor/js/jquery.js"></script>
<script src="/static/admin/vendor/layui/layui.js"></script>
<script src="/static/admin/custom/js/admin.js"></script>

<script>
    //Demo
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
</body>
</html>