<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>碎言碎语</title>
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <!-- Css -->
    <link href="/myBlog/Public/Home/css/style.min.css" rel="stylesheet" type="text/css"/>
    <link href="/myBlog/Public/Home/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/myBlog/Public/Home/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="/myBlog/Public/Home/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet" type="text/css"/>
    <link href="/myBlog/Public/Home/css/animate.css" rel="stylesheet" type="text/css"/>
    <!--doing页-->
    <link href="/myBlog/Public/Home/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Home/css/style.min.css-v=4.0.0.css" rel="stylesheet">
    <!-- Favicone Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="/myBlog/Public/Home/css/favicon.ico"/>
    <link rel="icon" type="image/png" href="/myBlog/Public/Home/css/favicon.png"/>
    <link rel="apple-touch-icon" href="/myBlog/Public/Home/css/favicon.png"/>
</head>
<body class="gray-bg">
<!-- Site preloader -->
<section id="preloader">
    <div class="site-spinner"></div>
</section>
<div id="page-wraper">
    <!-- Header -->
    <header id="header" class="header header-dark">
        <div class="header-inner">
            <!-- Logo -->
            <div class="logo">
                <a href="/myBlog">
                    <img class="logo-light" src="/myBlog/Public/Home/img/logo-light.png" alt="Apollo"/>
                    <img class="logo-dark" src="/myBlog/Public/Home/img/logo-dark.png" alt="Apollo"/>
                </a>
            </div>
            <!-- End Logo -->

            <!-- Mobile Navbar Icon -->
            <div class="nav-mobile nav-bar-icon">
                <span></span>
            </div>
            <!-- End Mobile Navbar Icon -->

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
                        <a class="external buy-now-btn btn-" href="<?php echo U(MODULE_NAME.'/Message/index');?>">
                            <span class="btn btn-sm btn-white-outline">留言板</span>
                        </a>
                    </li>
                    <li class="hidden-md hidden-lg">
                        <a class="external" href="<?php echo U(MODULE_NAME.'/Message/index');?>">留言板</a>
                    </li>
                </ul>
            </div>
            <!-- End Navbar Navigation -->
        </div>
    </header>
     End Header
     Intro
    <div class="hero overlay-dark60">
        <div class="col-xs-12">
            <div class="logotxt text-center">
                <h1><a href="">每天，说上两句...</a></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="wrapper wrapper-content">
                <div class="row animated fadeInRight">
                    <div class="col-sm-12">
                        <div class="ibox float-e-margins">
                            <div class="text-center float-e-margins p-md">
                                <span>预览：</span>
                                <a href="#" class="btn btn-xs btn-primary" id="lightVersion">浅色</a>
                                <a href="#" class="btn btn-xs btn-primary" id="darkVersion">深色</a>
                                <a href="#" class="btn btn-xs btn-primary" id="leftVersion">布局切换</a>
                            </div>
                            <div class="" id="ibox-content">
                                <div id="vertical-timeline" class="vertical-container light-timeline">
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon navy-bg">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        <?php if(is_array($saying)): foreach($saying as $key=>$v): ?><div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon blue-bg">
                                                    <i class="fa fa-file-text"></i>
                                                </div>

                                                <div class="vertical-timeline-content">
                                                    <p><?php echo ($v["say_content"]); ?></p>
                                                <span class="vertical-date">
                                             <br>
                                            <small><?php echo (date('Y-m-d H:i:s',$v["say_time"])); ?></small>
                                        </span>
                                                </div>
                                            </div><?php endforeach; endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagesay">
                            <div class="pagination ">
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
</div>

<script>
    $(document).ready(function () {
        $("#lightVersion").click(function (event) {
            event.preventDefault();
            $("#ibox-content").removeClass("ibox-content");
            $("#vertical-timeline").removeClass("dark-timeline");
            $("#vertical-timeline").addClass("light-timeline")
        });
        $("#darkVersion").click(function (event) {
            event.preventDefault();
            $("#ibox-content").addClass("ibox-content");
            $("#vertical-timeline").removeClass("light-timeline");
            $("#vertical-timeline").addClass("dark-timeline")
        });
        $("#leftVersion").click(function (event) {
            event.preventDefault();
            $("#vertical-timeline").toggleClass("center-orientation")
        })
    });
</script>
<script src="/myBlog/Public/Home/js/jquery-2.1.4.min.js"></script>
<script src="/myBlog/Public/Home/js/bootstrap.min.js-v=3.3.5"></script>
<script src="/myBlog/Public/Home/js/content.min.js-v=1.0.0"></script>
<script>
    $(document).ready(function(){$("#lightVersion").click(function(event){event.preventDefault();$("#ibox-content").removeClass("ibox-content");$("#vertical-timeline").removeClass("dark-timeline");$("#vertical-timeline").addClass("light-timeline")});$("#darkVersion").click(function(event){event.preventDefault();$("#ibox-content").addClass("ibox-content");$("#vertical-timeline").removeClass("light-timeline");$("#vertical-timeline").addClass("dark-timeline")});$("#leftVersion").click(function(event){event.preventDefault();$("#vertical-timeline").toggleClass("center-orientation")})});
</script>
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