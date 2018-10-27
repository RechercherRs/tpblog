<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\tpblog\public/../application/admin\view\category\index.html";i:1540436002;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章分类列表</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
</head>
<body style="padding:10px 10px;margin-bottom:50px;">
<form class="layui-form" action="<?php echo url('category/sort'); ?>" method="post">
    <div>
        <a href="<?php echo url('category/add'); ?>" class="layui-btn layui-btn-normal">添加分类</a>
        <button type="submit" class="layui-btn layui-btn-danger ">更新排序</button>
    </div>
    <table class="layui-table" lay-size="sm">
        <colgroup>
            <col width="80">
            <col>
            <col width="120">
            <col width="100">
            <col width="100">
            <col width="200">
        </colgroup>
        <thead>
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>是否显示在导航栏</th>
            <th>文章总数</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['categoryid']; ?></td>
            <td><?php echo $vo['name']; ?></td>
            <td style="text-align: center;">
                <input type="text" name="" value="<?php echo $vo['isnav']; ?>" style="width: 50px">
                <input type="checkbox" name="isnav" value="1" lay-skin="switch" <?php echo !empty($data['isnav'])?"checked":""; ?> lay-text="显示|隐藏">
            </td>
            <td><?php echo $vo['total']; ?></td>
            <td><input type="text" name="<?php echo $vo['categoryid']; ?>" value="<?php echo $vo['sort']; ?>" style="width: 50px"></td>
            <td>
                <a href="<?php echo url('category/edit',['id'=>$vo['categoryid']]); ?>" class="layui-btn layui-btn-warm layui-btn-mini" >编辑</a>
                <a href="<?php echo url('category/del',['id'=>$vo['categoryid']]); ?>" class="layui-btn layui-btn-danger layui-btn-mini del" >删除</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</form>
<script src="/static/admin/vendor/js/jquery.js"></script>
<script src="/static/admin/vendor/layui/layui.js"></script>
<script src="/static/admin/custom/js/admin.js"></script>
<script>
    layui.use('layer', function(){
        var layer = layui.layer;
        $('.del').on('click',function () {
            var url = $(this).attr('href')
            layer.confirm('确定删除吗？', {icon: 3, title:'提示'}, function(index){
                //do something
                location.href=url;
                layer.close(index);
            });
            return false;
        })
    });
    $(function () {
        $(window.parent.document).find('#righttitle').text($('title').text());
    });
</script>
</body>
</html>