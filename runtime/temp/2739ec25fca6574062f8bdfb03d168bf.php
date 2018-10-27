<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\tpblog\public/../application/admin\view\comment\index.html";i:1539158778;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>评论列表</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
</head>
<body style="padding:10px 10px;margin-bottom:50px;">
<form class="layui-form" action="" method="post">
    <table class="layui-table" lay-size="sm">
        <colgroup>
            <col width="80">
            <col width="80">
            <col width="80">
            <col width="100">
            <col width="200">
            <col width="100">
        </colgroup>
        <thead>
        <tr>
            <th>ID</th>
            <th>昵称</th>
            <th>评论时间</th>
            <th>评论IP</th>
            <th>评论内容</th>
            <th>文章</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo $vo['commentid']; ?></td>
            <td><?php echo $vo['nickname']; ?></td>
            <td><?php echo date('Y/m/d H:i',$vo['createdat']); ?></td>
            <td><?php echo $vo['createdip']; ?></td>
            <td><?php echo $vo['content']; ?></td>
            <td><?php echo $vo['articleid']; ?></td>
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
    $('table').emojiParse({
            icons: [{
                path: "/static/admin/vendor/layui/images/tieba/",
                file: ".jpg",
                placeholder: ":{alias}:",
                alias: {
                    1: "hehe",
                    2: "haha",
                    3: "tushe",
                    4: "a",
                    5: "ku",
                    6: "lu",
                    7: "kaixin",
                    8: "han",
                    9: "lei",
                    10: "heixian",
                    11: "bishi",
                    12: "bugaoxing",
                    13: "zhenbang",
                    14: "qian",
                    15: "yiwen",
                    16: "yinxian",
                    17: "tu",
                    18: "yi",
                    19: "weiqu",
                    20: "huaxin",
                    21: "hu",
                    22: "xiaonian",
                    23: "neng",
                    24: "taikaixin",
                    25: "huaji",
                    26: "mianqiang",
                    27: "kuanghan",
                    28: "guai",
                    29: "shuijiao",
                    30: "jinku",
                    31: "shengqi",
                    32: "jinya",
                    33: "pen",
                    34: "aixin",
                    35: "xinsui",
                    36: "meigui",
                    37: "liwu",
                    38: "caihong",
                    39: "xxyl",
                    40: "taiyang",
                    41: "qianbi",
                    42: "dnegpao",
                    43: "chabei",
                    44: "dangao",
                    45: "yinyue",
                    46: "haha2",
                    47: "shenli",
                    48: "damuzhi",
                    49: "ruo",
                    50: "OK"
                }
            }, {
                path: "/static/admin/vendor/layui/images/qq/",
                file: ".gif",
                placeholder: "#qq_{alias}#"
            },{
                path: "/static/admin/vendor/layui/images/emoji/",
                file: ".png",
                placeholder: "#emoji_{alias}#"
            }]
        });
</script>
</body>
</html>