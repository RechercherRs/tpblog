<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\tpblog\public/../application/index\view\comment\commlist.html";i:1539155180;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>查看评论</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/jquery.mCustomScrollbar.min.css"/>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/jquery.emoji.css"/>
</head>
<body class="layui-layout-body" style="padding:10px 10px;margin-bottom:50px;">
<div class="layui-container">
    <?php if(is_array($comm) || $comm instanceof \think\Collection || $comm instanceof \think\Paginator): $i = 0; $__LIST__ = $comm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
    <div id="comm" class="layui-tab-card" style="width: 600px;display: block;">
        <div class="layui-tab-content" style="font-size: 18px"><a href="<?php echo url('index/useradd',['getname'=>$v['nickname']]); ?>}"><?php echo $v['nickname']; ?></a><br>
            <span><?php echo date('Y/m/d H:i',$v['createdat']); ?></span>
            <hr class="layui-bg-black" style="width: 40%;">
        </div>
        <div class="layui-card-body" style="padding: 10px"><?php echo $v['content']; ?></div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<script src="/static/admin/vendor/js/jquery.js"></script>
<script src="/static/admin/vendor/layui/layui.js"></script>
<script src="/static/admin/custom/js/admin.js"></script>
<script src="/static/admin/vendor/js/jquery.mousewheel-3.0.6.min.js"></script>
<script src="/static/admin/vendor/js//jquery.mCustomScrollbar.min.js"></script>
<script src="/static/admin/vendor/js/jquery.emoji.js"></script>
<script>
    //Demo
    layui.use(['form','element'], function(){
        var form = layui.form;
        var element = layui.element;
        //监听提交
        form.on('submit(formDemo)', function(data){
        });
    });
    $(function () {
        $(window.parent.document).find('#righttitle').text($('title').text());
    });

        $('div').emojiParse({
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