<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\tpblog\public/../application/admin\view\link\index.html";i:1540173439;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>友情链接列表</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
</head>
<body style="padding:10px 10px;margin-bottom:50px;">
<form class="layui-form" action="" method="post">
    <table class="layui-table" lay-size="sm">
        <colgroup>
            <col width="80">
            <col width="120">
            <col width="100">
            <col width="100">
            <col width="200">
        </colgroup>
        <thead>
        <tr>
            <th>网站名称</th>
            <th>链接地址</th>
            <th>状态</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($body) || $body instanceof \think\Collection || $body instanceof \think\Paginator): $i = 0; $__LIST__ = $body;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['name']; ?></td>
            <td><?php echo $vo['link']; ?></td>
            <td style="text-align: center;">
                <input type="text" name="" value="<?php echo $vo['status']; ?>" style="width: 50px">
            </td>
            <td><?php echo $vo['sort']; ?></td>
            <td>
                <a href="<?php echo url('link/ins',['id'=>$vo['linkid']]); ?>" class="layui-btn layui-btn-warm layui-btn-mini" >编辑</a>
                <a href="<?php echo url('link/dele',['id'=>$vo['linkid']]); ?>" class="layui-btn layui-btn-danger layui-btn-mini del" >删除</a>
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