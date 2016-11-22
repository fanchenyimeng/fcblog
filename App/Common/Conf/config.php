<?php
return array(
    //'配置项'=>'配置值'
    'MODULE_ALLOW_LIST'     => array('Home','flogin'), // 允许访问的模块
    'LOAD_EXT_CONFIG'       => 'verify,water,title,set,bgimg',//加载验证码配置文件verify,加载水印配置文件water，加载首页标题配置文件title。。
    //'LOAD_EXT_FILE'         =>'common',
    'DEFAULT_MODULE'        =>'Home',        //默认模块
    'URL_MODEL'=> 2,                          //URL模式：0：普通模式 1-默认pathinfo模式、2:重写模式、3:兼容模式
    'SESSION_AUTO_START'    =>true,          //是否开启session
    'URL_MODULE_MAP' => array('flogin'=>'admin'),
    /* 数据库设置 */
    'DB_PARAMS'          	=>  array(),     // 数据库连接参数
    'DB_DEBUG'  			=>  true,        // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8

    // 开启路由
    'URL_ROUTER_ON'   => true,
    //配置路由规则，在模块的配置文件中使用URL_ROUTE_RULES参数进行配置，配置格式是一个数组，每个元素都代表一个路由规则
    'URL_ROUTE_RULES' => array(
        'blog/:id\d' => array('List/Index'),   //列表页---  blog/id 指向当前Index模块下list控制器下面的index方法；:id 为$_GET['id']参数,\d为正则，表示传递的需要是数字
        'news/:id\d' => 'Show/Index',   //最新文章展示页---  news/id 指向当前Index模块下Show控制器下面的index方法；:id 为$_GET['id']参数,\d为正则，表示传递的需要是数字
        'hot/:id\d' => array('Show/Index'),    //热门文章展示页---  hot/id 指向当前Index模块下Show控制器下面的index方法；:id 为$_GET['id']参数,\d为正则，表示传递的需要是数字
        'about/:id\d' => array('Show/about'),  //about页---  about/id 指向当前Index模块下Show控制器下面的about方法；:id 为$_GET['id']参数,\d为正则，表示传递的需要是数字
        'doing/:id\d'  => array('Show/doing'), //碎言碎语页
        'photo/:id\d'  => array('Show/photo'),  //随拍
        'login/index'  => array('flogin/login/index')  //登录
    ),
//    'SHOW_PAGTRACE' =>true//开启调试模式 显示trace信息

    'ERROR_PAGE' =>'./404.html'//异常报错页面
);
