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


<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shCore.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushPhp.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushCpp.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushCss.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushJava.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushPython.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushRuby.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushSql.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushVb.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushXml.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushAS3.js"></script>
<script type="text/javascript" src="/myBlog/ueditor/third-party/SyntaxHighlighter/scripts/shBrushCSharp.js"></script>
<link type="text/css" rel="stylesheet" href="/myBlog/ueditor/third-party/SyntaxHighlighter/styles/shThemeRDark.css"/>
<script type="text/javascript">
    SyntaxHighlighter.all();
</script>

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
<div class="hero overlay-dark40"></div>
<div class="wrapper wrapper-content  animated fadeIn article">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 bl-top">
            <div class="ibox">
                <div class="ibox-content">
                    <!--<div class="pull-right">-->
                        <!--<button class="btn btn-white btn-xs" type="button">700BIKE</button>-->
                        <!--<button class="btn btn-white btn-xs" type="button">BeginOne</button>-->
                        <!--<button class="btn btn-white btn-xs" type="button">乐视超级自行车</button>-->
                    <!--</div>-->
                    <!--<?php if(is_array($parent)): foreach($parent as $key=>$v): endforeach; endif; ?>-->
                    <div class="text-center article-title">
                        <h2>
                            <?php echo ($blog["title"]); ?>
                        </h2>
                    </div>
                    <div class="container text-center">
                        <h3 class="alt-title mb-45 alt-bander">
                            <span >编辑：<?php echo ($blog["blogauther"]); ?></span>&nbsp;&nbsp;
                            <span >发布时间：<?php echo (date('Y-m-d',$blog["time"])); ?> </span>&nbsp;&nbsp;
                            <span >阅读（<script type="text/javascript" src="<?php echo U(MODULE_NAME.'/Show/clickNum',array('id'=>$blog['id']));?>"></script>） </span>
                        </h3>
                    </div>
                     <div class="main-cont">
                         <?php echo ($blog["content"]); ?>
                     </div>
                        <div class="content-key">
                            关键字：<button class="btn btn-white btn-xs" type="button"><?php echo ($blog["tags"]); ?></button>
                        </div>
                        <hr>
                    <div class="row main-cont">
                        <div class="col-lg-12 comment">
                            <h4>评论：</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
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