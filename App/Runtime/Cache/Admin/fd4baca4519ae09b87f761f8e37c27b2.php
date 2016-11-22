<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分类列表</title>
    <link rel="shortcut icon" href="favicon.ico"> <link href="/myBlog/Public/Admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="/myBlog/Public/Admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet"><base target="_blank">
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>分类列表</h5>
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
                    <div class="ibox-content" style="padding-bottom: 50px;">
                        <form action="<?php echo U(MODULE_NAME.'/Category/sortCate');?>" method="post">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>分类名称</th>
                                        <th>级别</th>
                                        <th>排序</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr class="gradeX">
                                        <td><?php echo ($v["id"]); ?></td>
                                        <td><?php echo ($v["html"]); echo ($v["name"]); ?></td>
                                        <td><?php echo ($v["level"]); ?></td>
                                        <td class="center"><input type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>"></td>
                                        <td class="center">
                                            [<a href="<?php echo U(MODULE_NAME.'/Category/addCate',array('pid'=> $v['id']));?>">添加子分类</a>]
                                            [<a href="<?php echo U(MODULE_NAME.'/Category/editCate',array('id'=> $v['id']));?>">修改</a>]
                                            [<a href="<?php echo U(MODULE_NAME.'/Category/delCate',array('id'=> $v['id']));?>">删除</a>]
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="col-sm-1 col-sm-offset-5">
                                    <button class="btn btn-primary" type="submit">保存排序</button>
                                </div>
                            </div>
                        </form>
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
    <script>
        $(document).ready(function(){$(".dataTables-example").dataTable();var oTable=$("#editable").dataTable();oTable.$("td").editable("http://www.zi-han.net/theme/example_ajax.php",{"callback":function(sValue,y){var aPos=oTable.fnGetPosition(this);oTable.fnUpdate(sValue,aPos[0],aPos[1])},"submitdata":function(value,settings){return{"row_id":this.parentNode.getAttribute("id"),"column":oTable.fnGetPosition(this)[2]}},"width":"90%","height":"100%"})});function fnClickAddRow(){$("#editable").dataTable().fnAddData(["Custom row","New row","New row","New row","New row"])};
    </script>
</body>

</html>