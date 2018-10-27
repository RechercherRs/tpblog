<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\tpblog\public/../application/admin\view\article\index.html";i:1540346620;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章列表</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
</head>
<body style="padding:10px 10px;margin-bottom:50px;">
<form class="layui-form" action="<?php echo url('article/sort'); ?>" method="post">
    <div>
        <a href="<?php echo url('article/add'); ?>" class="layui-btn layui-btn-normal">添加文章</a>
        <button type="submit" class="layui-btn layui-btn-danger ">更新排序</button>
    </div>
    <table class="layui-table" lay-size="sm">
        <colgroup>
            <col width="100">
            <col width="100">
            <col width="150">
            <col width="80">
            <col width="150">
            <col width="150">
            <col width="80">
            <col width="80">
            <col width="150">
            <col width="150">
            <col width="150">
        </colgroup>
        <thead>
        <tr>
            <th>标题</th>
            <th>介绍</th>
            <th>封面</th>
            <th>点击数</th>
            <th>发布时间</th>
            <th>更新时间</th>
            <th>状态</th>
            <th>文章排序</th>
            <th>正文</th>
            <th>所属分类</th>
            <th>操作</th>
        </tr>
        <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['title']; ?></td>
            <td><?php echo $vo['description']; ?></td>
            <td><img src="/<?php echo $vo['images']; ?>" alt=""> </td>
            <td><?php echo $vo['hits']; ?><span>次</span></td>
            <td><?php echo date('Y/m/d H:i',$vo['createdat']); ?></td>
            <td><?php echo date('Y/m/d H:i',$vo['updateat']); ?></td>
            <td><?php echo $vo['status']; ?></td>
            <td><input type="text" name="<?php echo $vo['articleid']; ?>" value="<?php echo $vo['sort']; ?>" style="width: 50px"></td>
            <td><?php echo $vo['content']; ?></td>
            <td><?php echo $vo['name']; ?></td>
            <!--  ['id'=>$vo.id]  传参到前端，并接收  -->
            <td>
                <a href="<?php echo url('article/edit',['id'=>$vo['articleid'],'cateid'=>$vo['categoryid']]); ?>" class="layui-btn layui-btn-warm layui-btn-mini" >编辑</a>
                <a href="<?php echo url('article/del',['id'=>$vo['articleid'],'cateid'=>$vo['categoryid']]); ?>" class="layui-btn layui-btn-danger layui-btn-mini del" >删除</a>
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