<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>说说管理</title>
    <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/myBlog/Public/Admin/css/plugins/markdown/bootstrap-markdown.min.css"/>
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">

</head>
<body>
<div class="gray-bg">
    <div class="wrapper wrapper-content">

        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal m-t" id="commentForm" action="<?php echo U(MODULE_NAME.'/Say/addSay');?>" method="post">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>发布说说</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>

                        <div class="ibox-content">
                            <textarea name="content" data-provide="markdown" rows="10"></textarea>
                        </div>
                        <div class="ibox-submit ">
                            <button class="btn btn-success" type="submit">
                                <i class="fa fa-check"></i>&nbsp;&nbsp;<span class="bold">发布</span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="/myBlog/Public/Admin/js/jquery-2.1.4.min.js"></script>
<script src="/myBlog/Public/Admin/js/content.min.js-v=1.0.0"></script>
<script type="text/javascript" src="/myBlog/Public/Admin/js/plugins/markdown/markdown.js"></script>
<script type="text/javascript" src="/myBlog/Public/Admin/js/plugins/markdown/to-markdown.js"></script>
<script type="text/javascript" src="/myBlog/Public/Admin/js/plugins/markdown/bootstrap-markdown.js"></script>
<script type="text/javascript" src="/myBlog/Public/Admin/js/plugins/markdown/bootstrap-markdown.zh.js"></script>
</body>
</html>