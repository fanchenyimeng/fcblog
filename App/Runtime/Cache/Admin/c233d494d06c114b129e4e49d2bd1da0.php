<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>相册</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <script src="/myBlog/Public/Admin/js/jquery-3.1.0.min.js"></script>
    <script src="/myBlog/Public/Admin/js/layer/layer.js"></script>
    <link href="/myBlog/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
</head>
<body class="gray-bg">

<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>相册</h5>
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
                    <p>
                    <button id="uploadimg" class="btn btn-success dropzone-previews" type="button"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">上传照片</span></button>
                        <button type="button" class="btn btn-w-m btn-white" id="addImgCate">创建相册</button>
                <div class="row">
                    <?php if(is_array($imgcate)): foreach($imgcate as $key=>$v): ?><div class="col-sm-2 p-width" data-animation="pulse" >
                                <a href="<?php echo U(MODULE_NAME.'/Photo/ViewPhoto',array('id'=>$v['id']));?>">
                                    <div class="widget-head-color-box navy-bg p-img">
                                        <img src="/myBlog/<?php echo ($v["imgbg"]); ?>" class="img-photo">
                                    </div>
                                </a>
                                <div class="widget-text-box">
                                    <div class="btn-group drop-pho">
                                        <button data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu drop-photo">
                                            <li><a href="<?php echo U(MODULE_NAME.'/Photo/editImgCate',array('id'=>$v['id']));?>">编辑</a></li>
                                            <li class="delPhotoCate" biz_module_id="<?php echo ($v['id']); ?>" biz_module_type="1" onclick="setDate(this);"><a>删除</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <span><?php echo ($v["photonum"]); ?> 张</span>
                                    </div>

                                    <input type="hidden" name="id" value="<?php echo ($v["id"]); ?>">
                                    <h4 class="media-heading"><a href="<?php echo U(MODULE_NAME.'/Photo/ViewPhoto',array('id'=>$v['id']));?>"><?php echo ($v["img_cate_name"]); ?></a></h4>
                                </div>
                            </div><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#uploadimg').on('click', function(){
        layer.open({
           type:2,
            title:'上传照片',
            maxmin:true,
            shaadeClose:true,//点击遮罩关闭
            area:['1200px','600px'],
            content:'addPhoto',
            end:function(){
                location.reload();
            }
        });
    });
    $('#addImgCate').on('click', function(){
        layer.open({
            type:2,
            title:'创建相册',
            maxmin:true,
            shaadeClose:true,//点击遮罩关闭
            area:['1200px','500px'],
            content:'addImgCate',
            end:function(){
                location.reload();
            }
        });
    });

    $(".delPhotoCate").click(function(){
        var strid= $(this).attr("biz_module_id");
        var strtype= $(this).attr("biz_module_type");
        if(strtype==1){
            swal({
                title:"您确定要删除此相册吗",
                text:"此相册内所有照片将全部删除！",
                type:"warning",showCancelButton:true,
                confirmButtonColor:"#DD6B55",
                confirmButtonText:"是的，我要删除！",
                cancelButtonText:"让我再考虑一下…",
                closeOnConfirm:false,closeOnCancel:false
            },function(isConfirm){
                if(isConfirm){
                    var jdata={
                        "id":strid,
                        "type":strtype
                    };
                    $.ajax({
                        type:"GET",
                        data:jdata,
                        url:"<?php echo U(MODULE_NAME.'/Photo/delPhotoCate');?>",
                        success:function(data){
                            console.log(data);
                            var info=data.info;
                            var iret=info.iret;
                            var msg=info.msg;
                            if(iret==0){
                                window.location.reload();
                                swal(
                                        msg,"相册已删除。",
                                        "success"
                                );
                            }else{
                                swal(
                                        "删除失败！","请重新删除。",
                                        "error"
                                );
                            }
                        }
                    });
                }else{
                    swal(
                            "已取消","您取消了删除操作！","error"
                    )
                }
            })
        }
    });
</script>

<script src="/myBlog/Public/Admin/js/plugins/sweetalert/sweetalert.min.js" ></script>
<script src="/myBlog/Public/Admin/js/bootstrap.min.js"></script>
<script src="/myBlog/Public/Admin/js/content.min.js-v=1.0.0"></script>
</body>

</html>