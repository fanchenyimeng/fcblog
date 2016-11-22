<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>说说列表</title>
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
                    <h5>说说列表</h5>
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
                        <a href="<?php echo U(MODULE_NAME.'/Say/say');?>" class="btn btn-primary ">发布说说</a>
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>内容</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($saying)): foreach($saying as $key=>$v): ?><tr class="gradeX">
                                <td><?php echo ($v["id"]); ?></td>
                                <td><?php echo ($v["say_content"]); ?></td>
                                <td class="center"><?php echo (date('Y-m-d H:i',$v["say_time"])); ?></td>
                                <td class="center"><if condition="ACTION_NAME eq 'index'">
                                    <button type="button" class="btn btn-primary btn-xs delSay" style="margin-bottom: 0px" biz_module_id="<?php echo ($v['id']); ?>" biz_module_type="1" onclick="setDate(this);">删除</button>
                                </td>
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
        oTable.$("td").editable({
                    "callback":function(sValue,y){
                        var aPos=oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue,aPos[0],aPos[1])
                    },
                    "submitdata":function(value,settings){
                        return{"row_id":this.parentNode.getAttribute("id"),
                        "column":oTable.fnGetPosition(this)[2]
                        }
                    },"width":"90%","height":"100%"
                }
        )
    });
    function fnClickAddRow(){
        $("#editable").dataTable().fnAddData(
                ["Custom row","New row","New row","New row","New row"]
        )
    }
</script>
<script>
    $(".delSay").click(function(){
        var strid= $(this).attr("biz_module_id");
        var strtype= $(this).attr("biz_module_type");
        if(strtype==1){
            swal({
                title:"您确定要删除这条说说吗",
                text:"删除后不可以恢复！",
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
                        url:"<?php echo U(MODULE_NAME.'/Say/delSay');?>",
                        success:function(data){
                            console.log(data);
                            var info=data.info;
                            var iret=info.iret;
                            var msg=info.msg;
                            if(iret==0){
                                window.location.reload();
                                swal(
                                        msg,"说说已删除。",
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
</body>
</html>