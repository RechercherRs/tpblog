<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"D:\tpblog\public/../application/admin\view\article\add.html";i:1540360019;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加文章</title>
    <link rel="stylesheet" href="/static/admin/vendor/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/custom/css/style.css">
    <style>
        .layui-form-select dl{z-index: 2}
        #thumb_list{padding-top: 8px}
        #thumb_list img{border: 1px solid #ddd;padding: 3px;border-radius: 5px}
        #thumb_list span{position: relative; display: inline-block;margin-right: 5px}
        #thumb_list span .delimg{position:absolute;right:3px;top:3px;}
    </style>
</head>

<body style="padding:10px 10px;margin-bottom:50px;">

    <div class="layui-container">
        <form class="layui-form" action="?" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-inline">
                    <select name="categoryid" required lay-verify="required">
                        <option value="">请选择所属分类</option>
                        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['categoryid']; ?>"><?php echo $vo['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" lay-verify="required" placeholder="请输入文章标题" autocomplete="off"
                        class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章介绍</label>
                <div class="layui-input-block">
                    <input type="text" name="description" lay-verify="required" placeholder="请输入文章介绍" autocomplete="off"
                        class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章封面</label>
                <div class="layui-input-block">
                    <input class="a1" type="hidden" name="images" placeholder="请上传文章封面" autocomplete="off" class="layui-input">
                    <img class="a2" src="" />
                    <button type="button" class="layui-btn" id="uploadimg">
                        <i class="layui-icon">&#xe67c;</i>上传封面
                    </button>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">点击数</label>
                <div class="layui-input-block">
                    <input type="text" name="hits" value="0" required lay-verify="required" autocomplete="off" class="layui-input"
                        style="width: 50px;">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">发布时间</label>
                <div class="layui-input-inline">
                    <input type="text" name="createdat" value="<?php echo date('Y/m/d h:m:s',time())?>" required
                        lay-verify="required" placeholder="请输入添加时间" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">发表状态</label>
                <div class="layui-input-inline">
                    <input type="checkbox" name="status" value="1" lay-skin="switch" lay-text="已发|未发" checked>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-block">
                    <input type="text" name="sort" value="100" required lay-verify="required" autocomplete="off" class="layui-input"
                        style="width: 50px">
                </div>

            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章正文</label>
                <div class="layui-input-block">
                    <textarea name="content" placeholder="请输入文章正文" class="layui-textarea"></textarea>
                </div>
            </div>
            <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button id="button" class="layui-btn" lay-submit lay-filter="formDemo">添加</button>
                </div>
            </div>

        </form>
    </div>

    <script src="/static/admin/vendor/js/jquery.js"></script>
    <script src="/static/admin/vendor/layui/layui.js"></script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/static/admin/vendor/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/static/admin/vendor/utf8-php/ueditor.all.js"></script>
    <script src="/static/admin/custom/js/admin.js"></script>


    <script>
        var ue = UE.getEditor('content', {
            initialFrameWidth: null,
        });
        //Demo
        layui.use(['form'], function () {
            var form = layui.form;
            //监听提交
            form.on('submit(formDemo)', function (data) {});
        });
        layui.use('upload', function () {
            var upload = layui.upload;

            //执行实例
            var uploadInst = upload.render({
                elem: '#uploadimg' //绑定元素
                    ,
                url: '<?php echo url("Common/upimg"); ?>' //上传接口
                    ,
                size: 2048,
                accept: 'images',
                field: 'image'
                    //,auto: true //选择文件后不自动上传
                    ,
                bindAction: '#uploadimg' //指向一个按钮触发上传
                    ,
                done: function (res) {
                    console.log(res);
                    if (res.code == 1) {
                        $('.a1').val(res.img);
                        $('.a2').attr('src', "/" + res.img);
                        layer.msg('上传成功！');
                    } else {
                        layer.msg('上传失败');
                    }

                },
                error: function () {
                    console.log(123);
                }

            });
        });

        $(function () {
            $(window.parent.document).find('#righttitle').text($('title').text());
        });
    </script>
</body>

</html>