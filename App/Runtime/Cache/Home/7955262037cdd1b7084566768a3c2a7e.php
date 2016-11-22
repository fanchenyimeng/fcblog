<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo (C("homeTitle")); ?></title>
    <meta name="description" content="" />
    <meta name="author" content="nileforest">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <!-- Css -->
    <link href="/myBlog/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/myBlog/Public/Home/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/myBlog/Public/Home/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="/myBlog/Public/Home/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet" type="text/css" />
    <!--相册-->
    <link href="/myBlog/Public/Home/js/fancybox/jquery.fancybox.css" rel="stylesheet">
    <!-- Favicone Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/myBlog/Public/Home/css/favicon.ico" />
    <link rel="icon" type="image/png" href="/myBlog/Public/Home/css/favicon.png" />
    <link rel="apple-touch-icon" href="/myBlog/Public/Home/css/favicon.png" />



</head>
<body id="demopage" class="wow-animate">

<!-- Site preloader -->
<section id="preloader">
    <div class="site-spinner"></div>
</section>
<!-- End Site preloader -->

<!-- Page Wraper -->
<div id="page-wraper">

    <!-- Header -->
    <header id="header" class="header header-dark">
        <div class="header-inner">
            <!-- Logo -->
            <div class="logo">
                <a href="/myBlog">
                    <img class="logo-light" src="/myBlog/Public/Home/img/logo-light.png" alt="Apollo" />
                    <img class="logo-dark" src="/myBlog/Public/Home/img/logo-dark.png" alt="Apollo" />
                </a>
            </div>
            <!-- End Logo -->
            <div class="nav-mobile nav-bar-icon">
                <span></span>
            </div>
            <!-- Navbar Navigation -->
            <div class="nav-menu singlepage-nav">
                <ul class="nav-menu-inner">
                    <li>
                        <a class="external menu-has-sub" href="/myBlog">首页</a>
                    </li>
                    <?php
 $_nav_cate = M('cate')->order("sort")->select(); import('Class.Category', APP_PATH); $Category = new \Category(); $_nav_cate = $Category::unlimitedForLayer($_nav_cate); foreach ($_nav_cate as $_nav_cate_v): extract($_nav_cate_v); if($id==31){ $url = U('/about/'.$id); } else if($id==33){ $url = U('/doing/'.$id); }else if($id==36){ $url = U('/photo/'.$id); }else{ $url = U('/blog/'.$id); } ?><li>
                            <a class="external menu-has-sub" href="<?php echo ($url); ?>"><?php echo ($name); ?></a>
                            <ul class="sub-dropdown dropdown">
                                <?php if(is_array($child)): foreach($child as $key=>$v): ?><li>
                                        <a class="menu-has-sub" href="<?php echo U('/liunian/'.$v['id']);?>"><?php echo ($v["name"]); ?></a>
                                    </li><?php endforeach; endif; ?>
                            </ul>
                        </li><?php endforeach;?>
                    <li><a href="" style="display:none;"></a></li>
                    <li class="hidden-sm hidden-xs">
                        <a class="external buy-now-btn btn-" href="<?php echo U(MODULE_NAME.'/Message/index');?>"><span class="btn btn-sm btn-white-outline">留言板</span></a>
                    </li>
                    <li class="hidden-md hidden-lg">
                        <a class="external" href="<?php echo U(MODULE_NAME.'/Message/index');?>">留言板</a>
                    </li>
                    <li class="hidden-sm hidden-xs">
                        <a class="external buy-now-btn btn-" href="<?php echo U('login/index');?>" target="_blank"><span class="btn btn-sm btn-white-outline">登录</span></a>
                    </li>
                    <li class="hidden-md hidden-lg">
                        <a class="external" href="<?php echo U(MODULE_NAME.'/Message/index');?>" target="_blank">登录</a>
                    </li>

                </ul>
            </div>
        </div>
    </header>
<!-- Intro -->
<div class="hero overlay-dark40">
    <div class="col-xs-12">
        <div class="logotxt text-center">
            <h1><a href="">点滴,汇成江河湖海...</a></h1>
        </div>
    </div>
</div>

<section id="intro-variation" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 main-content">
                <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><div class="post">
                        <div class="post-head">
                            <h3 class="post-title">
                                <a href="<?php echo U('news/'.$v['id']);?>"><?php echo ($v["title"]); ?></a>
                            </h3>
                            <section class="post-meta">
                                    <span class="author">作者: <a href="<?php echo U('/about/'.'31');?>"><?php echo ($v["blogauther"]); ?></a>
                                    </span>
                                <span>发布于：<?php echo (date('Y-m-d',$v["time"])); ?></span>
                            </section>
                        </div>
                        <div class="post-content">
                            <p>
                                <?php echo ($v["summary"]); ?>
                            </p>
                        </div>
                        <div class="post-premalink">
                            <div class="col-md-6 btn-yd">
                                <a class="btn btn-defaul" href="<?php echo U('news/'.$v['id']);?>">阅读全文</a>
                            </div>
                            <div class="col-md-6">
                                <div class="small text-right">
                                    <h5>状态：</h5>
                                    <i class="fa fa-eye"> </i> <?php echo ($v["click"]); ?>浏览
                                </div>
                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>
                <div class="col-md-12">
                    <div class="pagesay">
                        <div class="pagination">
                            <ul>
                                <li><?php echo ($page); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 sidebar">
                <!--<div class="sidebar-title"><h4 class=" glyphicon glyphicon-time">最新文章</h4></div>-->
                <div class="widget">
                    <h4 class="title glyphicon ">最新文章</h4>

                    <div class="content community">
                        <?php
 $field = array("id","title"); $where = array('del' => 0); $_new_blog=M("blog")->field($field)->where($where)->limit(6)->order("time DESC")->select(); foreach ($_new_blog as $_new_value): extract($_new_value); $url = U("/news/".$id); ?><a href="<?php echo ($url); ?>"><p class="post-sider">○&nbsp;<?php echo ($title); ?></p></a><?php endforeach;?>
                    </div>
                </div>
                <div class="widget">
                    <h4 class="title glyphicon">热门文章</h4>

                    <div class="content community">
                        <?php
 $where = array('del' => 0); $field = array("id","title","click"); $_hot_blog=M("blog")->field($field)->where($where)->limit(6)->order("click DESC")->select(); foreach ($_hot_blog as $_hot_value): extract($_hot_value); $url = U("/hot/".$id); ?><a href="<?php echo ($url); ?>"><p class="post-sider">○&nbsp;<?php echo ($title); ?></p></a><?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

        <!-- footer -->
        <div id="fh5co-footer">
            <div class="container">
                <div class="row">
                    <section class="col-md-3 col-sm-6">
                        <h5>About This Blog</h5>
                        <p style="font-size: 14px;line-height: 19px;">
                            一点点，一滴滴的汇聚成江河湖海
                        </p>
                    </section>
                    <section class="col-md-2 col-sm-6">
                        <h5>About me</h5>
                        <p style="font-size: 14px;line-height: 19px;">
                            一步一个脚印
                        </p>
                        <p style="font-size: 14px;line-height: 19px;">
                            努力前行
                        </p>

                    </section>
                    <section class="col-md-4 col-sm-6">
                        <h5>Other</h5>
                        <p style="font-size: 14px;line-height: 19px;text-align: left">

                        </p>
                    </section>
                    <section class="col-md-3 col-sm-6">
                        <div class="text-center to-animate"><a href="#" class="js-gotop">返回顶部</a></div>
                    </section>
                </div>
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-left">fanchenyimeng@outlook.com</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-right">&copy; 2016 By LiuNian &nbsp;&nbsp;流年</p>
                        </div>

                        <!--<div class="to-animate to-foo">&copy; 2016 By LiuNian &nbsp;&nbsp;流年-->
                        <!--</div>-->
                        <!--<div class="text-center to-animate"><a href="#" class="js-gotop">返回顶部</a></div>-->
                        <!--</div>-->
                    </div>
            </div>
        </div>
        <!-- JS Script -->
        <script src="/myBlog/Public/Home/js/jquery-2.1.4.min.js"></script>
        <script src="/myBlog/Public/Home/js/bootstrap.min.js-v=3.3.5"></script>
        <script src="/myBlog/Public/Home/js/peity/jquery.peity.min.js"></script>
        <script src="/myBlog/Public/Home/js/content.min.js-v=1.0.0"></script>
        <script src="/myBlog/Public/Home/js/fancybox/jquery.fancybox.js"></script>
        <!--<script type="text/javascript" src="/myBlog/Public/Home/js/fancybox/jquery.fancybox-thumbs.js"></script>-->
        <script>
            $(document).ready(function () {
                $(".fancybox").fancybox({
                    openEffect: "none",
                    closeEffect: "none",
                    closeBtn  : false,
                    arrows    : false,
                    nextClick : true,

                    helpers : {
                        thumbs : {
                            width  : 50,
                            height : 50
                        },
                        title : {
                            type : 'inside'
                        },
                        overlay : {
                            css : {
                                'background' : 'rgba(238,238,238,0.85)'
                            }
                        }
                    }
                })
            });
        </script>
        <script src="/myBlog/Public/Home/js/jquery.easing.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/SmoothScroll.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/owl.carousel.min.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/wow.min.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/isotope.pkgd.min.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.stellar.min.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.fitvids.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.appear.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.countTo.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.mb.YTPlayer.min.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.simple-text-rotator.min.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.backstretch.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/jquery.singlePageNav.min.js" type="text/javascript"></script>
        <script src="/myBlog/Public/Home/js/theme.js" type="text/javascript"></script>
    </body>
</html>