<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>设置首页标题</title>
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
                    <h5>标题设置</h5>
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
                    <form class="form-horizontal m-t" id="commentForm" action="<?php echo U(MODULE_NAME.'/System/setTitles');?>" method="post">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">标题内容：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="homeTitle" class="form-control" value="<?php echo (C("homeTitle")); ?>">
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">文字一：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="hometxtone" class="form-control" value="<?php echo (C("hometxtone")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">文字二：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="hometxttwo" class="form-control" value="<?php echo (C("hometxttwo")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">文字三：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="hometxthree" class="form-control" value="<?php echo (C("hometxthree")); ?>">
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