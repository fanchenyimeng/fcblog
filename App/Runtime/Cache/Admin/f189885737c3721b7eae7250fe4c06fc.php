<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>博文列表</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/myBlog/Public/Admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>博文列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="">
                            <a href="<?php echo U(MODULE_NAME.'/Blog/blog');?>" class="btn btn-primary ">添加文章</a>
                        </div>
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>博文标题</th>
                                    <th>所属分类</th>
                                    <th>阅读次数</th>
                                    <th>发布时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr class="gradeX">
                                    <td><?php echo ($v["id"]); ?></td>
                                    <td><?php echo ($v["title"]); ?></td>
                                    <td><?php echo ($v["cate"]); ?></td>
                                    <td class="center"><?php echo ($v["click"]); ?></td>
                                    <td class="center"><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
                                    <td class="center"><?php if(ACTION_NAME == 'index'): ?><a href="<?php echo U(MODULE_NAME.'/Blog/editBlog',array('id'=>$v['id']));?>"><button type="button" class="btn btn-primary btn-xs edit" style="margin-bottom: 0px">编辑</button></a>
                                        <button type="button" class="btn btn-primary btn-xs delblog" style="margin-bottom: 0px" biz_module_id="<?php echo ($v['id']); ?>" biz_module_type="1" onclick="setDate(this);">删除</button>
                                        <?php else: ?>
                                        <button type="button" class="btn btn-primary btn-xs delblog" style="margin-bottom: 0px" biz_module_id="<?php echo ($v['id']); ?>" biz_module_type="0" onclick="setDate(this);">还原</button>
                                        <a href="<?php echo U(MODULE_NAME.'/Blog/delete',array('id'=>$v['id']));?>"><button type="button" class="btn btn-primary btn-xs" style="margin-bottom: 0px">彻底删除</button></a><?php endif; ?></td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/myBlog/Public/Admin/js/jquery-2.1.4.min.js"></script>
    <script src="/myBlog/Public/Admin/js/bootstrap.min.js"></script>
    <script src="/myBlog/Public/Admin/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/myBlog/Public/Admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/myBlog/Public/Admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/myBlog/Public/Admin/js/content.min.js-v=1.0.0"></script>
    <script src="/myBlog/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".dataTables-example").dataTable();
            var oTable=$("#editable").dataTable();
            oTable.$("td").editable(
                    {"callback":function(sValue,y){
                        var aPos=oTable.fnGetPosition(this);
                        oTable.fnUpdate(sValue,aPos[0],aPos[1]
                        )
                    },
                        "submitdata":function(value,settings){
                            return{
                                "row_id":this.parentNode.getAttribute("id"),
                            "column":oTable.fnGetPosition(this)[2]
                            }
                        },"width":"90%","height":"100%"
                    }
            )
        });
        function fnClickAddRow(){
            $("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"]
            )
        }
    </script>
    <script>

        $(".delblog").click(function(){
            var strid= $(this).attr("biz_module_id");
            var strtype= $(this).attr("biz_module_type");
            if(strtype==1){
            swal({
                title:"您确定要删除这篇文章吗",
                text:"文章将删除到回收站！",
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
                        url:"<?php echo U(MODULE_NAME.'/Blog/toTrach');?>",
                        success:function(data){
                            console.log(data);
                            var info=data.info;
                            var iret=info.iret;
                            var msg=info.msg;
                            if(iret==0){
                                window.location.reload();
                                swal(
                                        msg,"文章已删除到回收站。",
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
            })}
            else{
                swal({
                    title:"您确定要还原这篇文章吗",
                    //text:"删除后将无法恢复，请谨慎操作！",
                    type:"warning",showCancelButton:true,
                    confirmButtonColor:"#DD6B55",
                    confirmButtonText:"是的，我要还原！",
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
                            url:"<?php echo U(MODULE_NAME.'/Blog/toTrach');?>",

                            success:function(data){
                                console.log(data);
                                var info=data.info;
                                var iret=info.iret;
                                var msg=info.msg;
                                if(iret==0){
                                    window.location.reload();
                                    swal(
                                            msg,"文章已还原。",
                                            "success"
                                    );
                                }else{
                                    swal(
                                            msg,"失败！",
                                            "error"
                                    );
                                }
                            }
                        });
                        windod.location.reload(true);
                    }else{
                        swal(
                                "已取消","您取消了删除操作！","error"
                        )
                    }
                })
            }
        });
    </script>
</body>

</html>