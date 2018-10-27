<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\tpblog\public/../application/admin\view\index\system.html";i:1540434010;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>网站配置</title>
    <link rel="stylesheet" href="/static/admin/vendor//layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom//css/style.css">
</head>
<body style="padding:0 10px;margin-bottom:50px;">
<div class="layui-collapse" lay-accordion="" lay-filter="collapse">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">软件信息</h2>
        <div class="layui-colla-content layui-show">
            <table class="layui-table">
                <tr>
                    <td width="40%">软件名称</td>
                    <td width="60%">ThinkPHPBlog</td>
                </tr>
                <tr>
                    <td>系统版本</td>
                    <td>v1.0.0</td>
                </tr>
                <tr>
                    <td>QQ群</td>
                    <td>*****</td>
                </tr>
                <tr>
                    <td>技术支持</td>
                    <td><a href="#';">ThinkPHPBlog</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">服务器信息</h2>
        <div class="layui-colla-content">
            <table class="layui-table">
                <tr>
                    <td>服务器IP</td>
                    <td><?php echo $system['ip']; ?></td>
                </tr>
                <tr>
                    <td width="40%">服务器域名</td>
                    <td width="60%"><?php echo $system['host']; ?></td>
                </tr>
                <tr>
                    <td>服务器操作系统</td>
                    <td><?php echo $system['os']; ?></td>
                </tr>
                <tr>
                    <td>运行环境</td>
                    <td><?php echo $system['server']; ?></td>
                </tr>
                <tr>
                    <td>服务器端口</td>
                    <td><?php echo $system['port']; ?></td>
                </tr>
                <tr>
                    <td width="40%">PHP版本</td>
                    <td width="60%"><?php echo $system['php_ver']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">数据库信息</h2>
        <div class="layui-colla-content">
            <table class="layui-table">
                <tr>
                    <td width="40%">数据库版本</td>
                    <td width="60%"><?php echo $system['mysql_ver']; ?></td>
                </tr>
                <tr>
                    <td>数据库名称</td>
                    <td><?php echo $system['database']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">管理员登录日志</h2>
        <div class="layui-colla-content">
            <table class="layui-table">
                <tr>
                    <td>名称</td>
                    <td>登录时间</td>
                    <td>登录IP</td>
                </tr>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><?php echo $vo['username']; ?></td>
                        <td><?php echo date('Y/m/d H:i',$vo['loginat']); ?></td>
                        <td><?php echo $vo['loginip']; ?></td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>
</div>
<script src="/static/admin/vendor//js/jquery.js"></script>
<script src="/static/admin/vendor//layui/layui.js"></script>
<script src="/static/admin/custom//js/admin.js"></script>
<script>
    //JavaScript代码区域
    layui.use(['layer','element'], function () {
        var layer = layui.layer, element = layui.element();

        //监听折叠
        element.on('collapse(collapse)', function(data){
            layer.msg('展开状态：'+ data.show);
        });

        // you code ...


    });
</script>
</body>
</html>