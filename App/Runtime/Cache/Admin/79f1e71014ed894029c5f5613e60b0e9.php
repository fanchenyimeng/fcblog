<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加文章</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css"rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/plugins/chosen/chosen.css" rel="stylesheet">

    <script type="text/javascript">
        window.UEDITOR_HOME_URL = '/myBlog/ueditor/';
        window.onload =function () {
            UE.getEditor('content',{
                serverUrl:"<?php echo U(MODULE_NAME.'/Blog/uploadUe');?>"
            });
        }
    </script>
    <script type="text/javascript" charset="utf-8" src="/myBlog/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/myBlog/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加载语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/myBlog/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body class="gray-bg">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加文章</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" id="commentForm" action="<?php echo U(MODULE_NAME.'/Blog/addBlog');?>" method="post">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">文章分类：</label>
                                <div class="col-sm-8">
                                    <select class="form-control m-b" name="cid">
                                        <option value="">请选择分类</option>
                                        <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">文章标题：</label>
                                <div class="col-sm-8">
                                    <input id="cname" name="title" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label">点击次数：</label>
                                <div class="col-sm-8">
                                    <input id="curl" type="text" class="form-control" name="click" value="100">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">作者：</label>
                                <div class="col-sm-8">
                                    <input id="curl" type="text" class="form-control" name="blogauther" value="<?php echo ($_SESSION['nickname']); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">关键字：</label>
                                <div class="col-sm-8">
                                    <input id="curl" type="text" class="form-control" name="tags">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">文章正文：</label>
                                <div class="col-sm-8">
                                    <textarea name="content" id="content" style= height:300px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1 col-sm-offset-1">
                                    <button class="btn btn-primary" type="submit">发布</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script src="/myBlog/Public/Admin/js/jquery-2.1.4.min.js"></script>
    <script src="/myBlog/Public/Admin/js/bootstrap.min.js"></script>
    <script src="/myBlog/Public/Admin/js/content.min.js-v=1.0.0"></script>
</body>

</html>