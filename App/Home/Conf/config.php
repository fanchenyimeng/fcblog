<?php
return array(
    //'配置项'=>'配置值'
    'TMPL_PARSE_STRING'=>array(
        '__HOMEIMG__'    => __ROOT__ . '/Public/Home' .'/img', //设置__HOMEIMG__ 指向文件夹位置
        '__HOMECSS__'    => __ROOT__ . '/Public/Home' .'/css', //设置__HOMECSS__ 指向文件夹位置
        '__HOMEJS__'     => __ROOT__ . '/Public/Home' .'/js', //设置__HOMEJS__ 指向文件夹位置
        '__PUBLIC__'=>__ROOT__.'/'.'Public',                  //设置__PUBLIC__ 指向文件夹位置
    ),

    'URL_HTML_SUFFIX' => '',

    //配置自定义标签库自动加载
    'TAGLIB_LOAD' => true,
    'APP_AUTOLOAD_PATH' => '@.TagLib',
    'TAGLIB_BUILD_IN' => 'Cx,TagLibFc',

    //开启静态缓存
    'HTML_CACHE_ON' =>true,
    'HTML_CACHE_RULES' =>array(// 定义静态缓存规则
        'Show:index' =>array('{:module}/{:controller}_{:action}_{id}',10)//定义Show控制器里面的index方法生成静态页面缓存，如果只写Show： 则表示Show控制器的所有方法都生成静态页面缓存
    ),

);