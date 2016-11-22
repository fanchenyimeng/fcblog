<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>验证码设置</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>验证设置</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" action="<?php echo U(MODULE_NAME.'/System/updateVerify');?>" method="post">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码图片高度：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="imageH" class="form-control" value="<?php echo (C("imageH")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码图片长度：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="imageW" class="form-control" value="<?php echo (C("imageW")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码过期时间：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="expire" class="form-control" value="<?php echo (C("expire")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码字体大小：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="fontSize" class="form-control" value="<?php echo (C("fontSize")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">验证码位数：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="length" class="form-control" value="<?php echo (C("length")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit">修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/myBlog/Public/Admin/js/jquery.min.js-v=2.1.4" ></script>
<script src="/myBlog/Public/Admin/js/bootstrap.min.js"></script>
<script src="/myBlog/Public/Admin/js/content.min.js-v=1.0.0"></script>
</body>
</html>