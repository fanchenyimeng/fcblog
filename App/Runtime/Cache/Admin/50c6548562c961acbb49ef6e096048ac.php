<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>照片上传</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="my-awesome-dropzone" class="dropzone" action="<?php echo U(MODULE_NAME.'/Photo/uploadPhoto');?>">
                        <div class="ibox-content ">
                            <div class="form-group cc-ll">
                                <label class="col-sm-1 cc-lk">上传到</label>
                                <div class="col-sm-8">
                                    <select class="form-control m-b" name="cid">
                                        <!--<option value="">选择相册</option>-->
                                        <?php if(is_array($imgcate)): foreach($imgcate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" name="cid"><?php echo ($v["img_cate_name"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="dropzone-previews"></div>
                        <!--<button type="submit" class="btn btn-primary pull-right">上传提交</button>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/myBlog/Public/Admin/js/jquery-2.1.4.min.js"></script>
<script src="/myBlog/Public/Admin/js/bootstrap.min.js"></script>
<script src="/myBlog/Public/Admin/js/content.min.js-v=1.0.0"></script>
<script src="/myBlog/Public/Admin/js/plugins/dropzone/dropzone.js"></script>
<script>
    var Dropzone = require("dropzone");
//    $(document).ready(function(){
//        Dropzone.options.myAwesomeDropzone={
//            paramName: "file",
//            autoProcessQueue:false,
//            uploadMultiple:true,
//            parallelUploads:100,
//            maxFiles:100,
//            init:function(){
//                var myDropzone=this;
//                this.element.querySelector(
//                        "button[type=submit]"
//                ).addEventListener(
//                        "click",
//                        function(e){
//                            e.preventDefault();
//                            e.stopPropagation();
//                            myDropzone.processQueue()
//                        }
//                );
//                this.on(
//                        "sendingmultiple",
//                        function(){
//
//                        }
//                );
//                this.on(
//                        "successmultiple",
//                        function(files,response){
//
//                        }
//                );
//                this.on(
//                        "errormultiple",
//                        function(files,response){
//
//                        }
//                )
//            }
//        }
//    });
</script>
</body>

</html>