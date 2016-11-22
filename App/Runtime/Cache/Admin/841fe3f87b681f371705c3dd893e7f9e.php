<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/myBlog/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">

    <link href="/myBlog/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/myBlog/Public/Admin/css/style.min.css" rel="stylesheet">
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">Q1 销量</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 上升
                    </h2>
                    <small>更新时间：12天以前</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content ">
                    <h5 class="m-b-md">Q2 销量</h5>
                    <h2 class="text-navy">
                        <i class="fa fa-play fa-rotate-270"></i> 上升
                    </h2>
                    <small>更新时间：12天以前</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">Q3 销量</h5>
                    <h2 class="text-danger">
                        <i class="fa fa-play fa-rotate-90"></i> 下降
                    </h2>
                    <small>更新时间：12天以前</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 class="m-b-md">Q4 销量</h5>
                    <h2 class="text-danger">
                        <i class="fa fa-play fa-rotate-90"></i> 下降
                    </h2>
                    <small>更新时间：12天以前</small>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>本日访问量</h5>
                    <h2>198 009</h2>
                    <div id="sparkline1"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>本周访问量</h5>
                    <h2>65 000</h2>
                    <div id="sparkline2"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>本月访问量</h5>
                    <h2>680 900</h2>
                    <div id="sparkline3"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>平均停留时间</h5>
                    <h2>00:06:40</h2>
                    <div id="sparkline4"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>使用率</h5>
                    <h2>65%</h2>
                    <div class="progress progress-mini">
                        <div style="width: 68%;" class="progress-bar"></div>
                    </div>

                    <div class="m-t-sm small">4:32更新</div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>使用率</h5>
                    <h2>50%</h2>
                    <div class="progress progress-mini">
                        <div style="width: 78%;" class="progress-bar"></div>
                    </div>

                    <div class="m-t-sm small">4:32更新</div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>使用率</h5>
                    <h2>14%</h2>
                    <div class="progress progress-mini">
                        <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                    </div>

                    <div class="m-t-sm small">4:32更新</div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>使用率</h5>
                    <h2>20%</h2>
                    <div class="progress progress-mini">
                        <div style="width: 28%;" class="progress-bar progress-bar-danger"></div>
                    </div>

                    <div class="m-t-sm small">4:32更新</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>百分比</h5>
                    <h2>42/20</h2>
                    <div class="text-center">
                        <div id="sparkline5"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>百分比</h5>
                    <h2>100/54</h2>
                    <div class="text-center">
                        <div id="sparkline6"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>百分比</h5>
                    <h2>685/211</h2>
                    <div class="text-center">
                        <div id="sparkline7"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>百分比</h5>
                    <h2>240/32</h2>
                    <div class="text-center">
                        <div id="sparkline8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>收入</h5>
                    <h1 class="no-margins">886,200</h1>
                    <div class="stat-percent font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                    <small>总收入</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>本月收入</h5>
                    <h1 class="no-margins">1 738,200</h1>
                    <div class="stat-percent font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                    <small>总收入</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>本日收入</h5>
                    <h1 class="no-margins">-200,100</h1>
                    <div class="stat-percent font-bold text-danger">12% <i class="fa fa-level-down"></i></div>
                    <small>总收入</small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>搜索有收入</h5>
                    <h1 class="no-margins">54,200</h1>
                    <div class="stat-percent font-bold text-danger">24% <i class="fa fa-level-down"></i></div>
                    <small>总收入</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>预警</h5>
                    <table class="table table-stripped small m-t-md">
                        <tbody>
                        <tr>
                            <td class="no-borders">
                                <i class="fa fa-circle text-navy"></i>
                            </td>
                            <td class="no-borders">
                                示例 01
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-circle text-navy"></i>
                            </td>
                            <td>
                                示例 02
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-circle text-navy"></i>
                            </td>
                            <td>
                                示例 03
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>项目</h5>
                    <table class="table table-stripped small m-t-md">
                        <tbody>
                        <tr>
                            <td class="no-borders">
                                <i class="fa fa-circle text-navy"></i>
                            </td>
                            <td class="no-borders">
                                示例 01
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-circle text-navy"></i>
                            </td>
                            <td>
                                示例 02
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-circle text-navy"></i>
                            </td>
                            <td>
                                示例 03
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>消息</h5>
                    <table class="table table-stripped small m-t-md">
                        <tbody>
                        <tr>
                            <td class="no-borders">
                                <i class="fa fa-circle text-danger"></i>
                            </td>
                            <td class="no-borders">
                                示例 01
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-circle text-danger"></i>
                            </td>
                            <td>
                                示例 02
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-circle text-danger"></i>
                            </td>
                            <td>
                                示例 03
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>通知</h5>
                    <table class="table table-stripped small m-t-md">
                        <tbody>
                        <tr>
                            <td class="no-borders">
                                <i class="fa fa-circle text-danger"></i>
                            </td>
                            <td class="no-borders">
                                示例 01
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-circle text-danger"></i>
                            </td>
                            <td>
                                示例 02
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-circle text-danger"></i>
                            </td>
                            <td>
                                示例 03
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script src="/myBlog/Public/Admin/js/jquery-2.1.4.min.js"></script>-->
<!--<script src="/myBlog/Public/Admin/js/bootstrap.min.js"></script>-->
<!--<script src="/myBlog/Public/Admin/js/plugins/sparkline/jquery.sparkline.min.js"></script>-->
<!--<script src="/myBlog/Public/Admin/js/content.min.js-v=1.0.0"></script>-->
<!--<script src="/myBlog/Public/Admin/js/demo/peity-demo.min.js"></script>-->

</body>
</html>