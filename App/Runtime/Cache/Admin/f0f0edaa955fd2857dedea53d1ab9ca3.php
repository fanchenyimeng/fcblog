<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>登录</title>
    <link href="/myBlog/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/login.min.css" rel="stylesheet">


    <script type="text/javascript" src="/myBlog/Public/Admin/js/login.js"></script>
    <script type="text/javascript" src="/myBlog/Public/Admin/js/jquery-2.1.4.min.js"></script>
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location}
    </script>
    <script type="text/javascript">
        var verifyURL = '<?php echo U("Admin/Login/verify","","");?>';
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">
                    <div class="logopanel m-b">
                        <h1>[ 那一年●夏天]</h1>
                    </div>
                    <div class="m-b"></div>
                    <h3> <strong>欢迎光临</strong></h3>
                    <strong>还没有账号？ <a href="#">立即注册&raquo;</a></strong>
                </div>
            </div>
            <div class="col-sm-5">
                <form method="post" action="<?php echo U('Admin/Login/login');?>">
                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md">登录到博客后台</p>
                    <input type="text" class="form-control uname" name="username" placeholder="用户名" />
                    <input type="password" class="form-control pword m-b" name="password" placeholder="密码" />
                    <input type="code" class="form-control pword m-b" name="code"/> <img src='<?php echo U("Admin/Login/verify","","");?>' id="code"/> <a href="javascript:void(change_code(this));">看不清</a></br>
                    <button class="btn btn-success btn-block">登录</button>
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2016 All Rights Reserved
            </div>
        </div>
    </div>
</body>

</html>