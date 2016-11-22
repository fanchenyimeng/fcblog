<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上传头像</title>
    <script type="text/javascript" src="/myBlog/Public/Admin/js/swfobject.js"></script>
    <script type="text/javascript" src="/myBlog/Public/Admin/js/fullAvatarEditor.js"></script>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <!--<link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">-->
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">

</head>
<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h3>上传头像</h3>
                    </div>
                    <div class="ibox-content">
                        <div class="m-t m-b" style="width:632px;text-align:center">
                            <div>
                                <p id="swfContainer">
                                    本组件需要安装Flash Player后才可使用，请从<a href="http://www.adobe.com/go/getflashplayer">这里</a>下载安装。
                                </p>
                            </div>
                        </div>
                        <script type="text/javascript">
                            swfobject.addDomLoadEvent(function () {
                                //以下两行代码正式环境下请删除
                                
                                var swf = new fullAvatarEditor("/myBlog/Public/Admin/fullAvatarEditor.swf", "/myBlog/Public/Admin/expressInstall.swf", "swfContainer", {
                                            id : 'swf',
                                            upload_url : "<?php echo U('Index/uploadImg',array('id'=>$_SESSION['uid']));?>",	//上传接口
                                            method : 'get',	//传递到上传接口中的查询参数的提交方式。更改该值时，请注意更改上传接口中的查询参数的接收方式
                                            src_upload : 2,		//是否上传原图片的选项，有以下值：0-不上传；1-上传；2-显示复选框由用户选择
                                            avatar_box_border_width : 0,
                                            avatar_sizes : '200*200|100*100',
                                            avatar_sizes_desc : '200*200像素|100*100像素',
                                            avatar_tools_visible : false,
                                            checkbox_visible : false
                                        }, function (msg) {
                                            switch(msg.code)
                                            {
                                                case 1 :
                                                    //alert("页面成功加载了组件！");
                                                    break;
                                                case 2 :
                                                    //alert("已成功加载图片到编辑面板。");
                                                    document.getElementById("upload").style.display = "inline";
                                                    break;
                                                case 3 :
                                                    if(msg.type == 0)
                                                    {
                                                        alert("摄像头已准备就绪且用户已允许使用。");
                                                    }
                                                    else if(msg.type == 1)
                                                    {
                                                        alert("摄像头已准备就绪但用户未允许使用！");
                                                    }
                                                    else
                                                    {
                                                        alert("摄像头被占用！");
                                                    }
                                                    break;
                                            }
                                        }
                                );
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2>
                                富头像上传编辑器简介
                            </h2>
                        <p>
                            富头像上传编辑器是一款支持本地上传、预览、视频拍照和网络加载的flash头像编辑上传插件，可缩放、裁剪、旋转、定位和调色等...。
                        </p>

                        <div class="alert alert-info">
                            官网：<a href="javascript:if(confirm('http://www.fullavatareditor.com/  \n\n���ļ��޷��� Teleport Ultra ����, ��Ϊ ����һ�����·���ⲿ������Ϊ������ʼ��ַ�ĵ�ַ��  \n\n�����ڷ������ϴ���?'))window.location='http://www.fullavatareditor.com/'" tppabs="http://www.fullavatareditor.com/" target="_blank">http://www.fullavatareditor.com/</a>
                        </div>
                        <p><span class="label label-warning">注意：这是一款商业插件，如果需要，请在获得许可后使用！</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>