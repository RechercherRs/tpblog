<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\tpblog\public/../application/admin\view\manager\index.html";i:1540370048;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理员列表</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
</head>
<body style="padding:10px 10px;margin-bottom:50px;">

<div class="">

    <table class="layui-table" lay-size="sm">
        <colgroup>
            <col width="50">
            <col width="100">
            <col width="80">
            <col width="80">
            <col width="80">
            <col width="100">
        </colgroup>
        <thead>
        <tr>
            <th>ID</th>
            <th>账号</th>
            <th>添加时间</th>
            <th>最近登录时间</th>
            <th>最近登录IP</th>
            <th>操作</th>
        </tr>
        </thead>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['adminid']; ?></td>
            <td><?php echo $vo['username']; ?></td>
            <td><?php echo date("Y/m/d H:i",$vo['createdat']); ?></td>
            <td><?php echo date("Y/m/d H:i",$vo['loginat']); ?></td>
            <td><?php echo $vo['loginip']; ?></td>
            <td>
                <a href="<?php echo url('manager/edit',['id'=>$vo['adminid']]); ?>" class="layui-btn layui-btn-warm layui-btn-mini" >编辑</a>
                <a href="<?php echo url('manager/del',['id'=>$vo['adminid']]); ?>" class="layui-btn layui-btn-danger layui-btn-mini del" >删除</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

</div>



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