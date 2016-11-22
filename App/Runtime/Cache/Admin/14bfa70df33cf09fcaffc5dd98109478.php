<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>数据库设置</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
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
                    <h1>数据库设置</h1>

                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" action="<?php echo U(MODULE_NAME.'/System/runset');?>" method="post">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">数据库类型：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="DB_TYPE" class="form-control" value="<?php echo (C("DB_TYPE")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">服务器地址：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="DB_HOST" class="form-control" value="<?php echo (C("DB_HOST")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">数据库名：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="DB_NAME" class="form-control" value="<?php echo (C("DB_NAME")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">用户名：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="DB_USER" class="form-control" value="<?php echo (C("DB_USER")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">密码：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="DB_PWD" class="form-control" value="<?php echo (C("DB_PWD")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">端口：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="DB_PORT" class="form-control" value="<?php echo (C("DB_PORT")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">数据库表前缀：</label>
                            <div class="col-sm-4">
                                <input  type="text" name="DB_PREFIX" class="form-control" value="<?php echo (C("DB_PREFIX")); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit">设置</button>
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