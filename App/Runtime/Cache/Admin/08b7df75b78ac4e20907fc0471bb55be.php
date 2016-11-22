<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>查看照片</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><a href="<?php echo U(MODULE_NAME.'/Photo/index');?>">相册列表&nbsp;&nbsp;>&nbsp;&nbsp;</a></h5>
                    <?php if(is_array($img_cate)): foreach($img_cate as $key=>$k): ?><h5><?php echo ($k["img_cate_name"]); ?></h5><?php endforeach; endif; ?>

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
                    <?php if(is_array($list)): foreach($list as $key=>$v): ?><span class="img-content">
                            <div class="btn-group drop-pho btn-del">
                                <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu drop-photo">
                                    <li><a href="<?php echo U(MODULE_NAME.'/Photo/editPhoto',array('id'=>$v['id']));?>">编辑</a></li>
                                    <li>
                                        <form action="<?php echo U(MODULE_NAME.'/System/bgimg');?>" method="post">
                                            <a>
                                                <input type="hidden" name="bgimg" value="<?php echo ($v["img_path"]); ?>">
                                                <button type="submit" class="btn btn-w-m btn-white">设置为背景</button>
                                            </a>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="<?php echo U(MODULE_NAME.'/Photo/photobg');?>" method="post">
                                            <a>
                                                <input type="hidden" name="imgbg" value="<?php echo ($v["thumb"]); ?>">
                                                <input type="hidden" name="imgcid" value="<?php echo ($v["imgcid"]); ?>">
                                                <button type="submit" class="btn btn-w-m btn-white">设置为封面</button>
                                            </a>
                                        </form>
                                    </li>
                                    <li><a class="btn btn-white btn-bitbucket" href="<?php echo U(MODULE_NAME.'/Photo/delPhoto',array('id'=>$v['id'],'cid'=>$v['imgcid']));?>"><i class="fa fa-trash-o"></i>&nbsp;删除</a></li>
                                </ul>
                            </div>
                            <a class="fancybox" data-fancybox-group="thumb" href="/myBlog/Public<?php echo ($v["img_path"]); ?>"
                               title="<?php echo ($v["img_content"]); ?>">
                                <img alt="image" src="/myBlog/<?php echo ($v["thumb"]); ?>"/>
                            </a>
                        </span><?php endforeach; endif; ?>
                </div>
                <div class="col-lg-12">
                    <div class="pagesay">
                        <div class="pagination">
                            <ul>
                                <li><?php echo ($page); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="/myBlog/Public/Admin/js/jquery-2.1.4.min.js"></script>
<script src="/myBlog/Public/Admin/js/bootstrap.min.js"></script>
<script src="/myBlog/Public/Admin/js/content.min.js-v=1.0.0"></script>

<script src="/myBlog/Public/Admin/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/myBlog/Public/Admin/js/plugins/fancybox/jquery.fancybox.js"></script>
<script>
    $(document).ready(function () {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none",
            closeBtn: false,
            arrows: false,
            nextClick: true,

            helpers: {
                thumbs: {
                    width: 50,
                    height: 50
                },
                title: {
                    type: 'inside'
                },
                overlay: {
                    css: {
                        'background': 'rgba(238,238,238,0.85)'
                    }
                }
            }
        })
    });
</script>

</body>

</html>