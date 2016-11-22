<?php

/**
 * 加Relation：关联模型
 * 加View：师徒模型
 * 什么都不加UserModel: 单表模型
 */
/**
 * 用户与角色关联模型
 */
namespace Admin\Model;
use Think\Model\RelationModel;
class PhotoRelationModel extends RelationModel {

    //定义使用哪个主表
    protected $tableName = 'albumphoto';

    //定义要管理哪些表
    protected $_link = array(

        'img_cate' => array(
            'mapping_type' => self::BELONGS_TO,  //多对一关系。  一对多关系：HAS_MANY，反过来是多对一：BELONGS_TO  上面bolg是多，分类cate是一
            'foreign_key' => 'imgpid',              //主表在中间表中的字段名称
            'mapping_fields' =>'img_cate_name',           //只读取分类名字name值，不加的话分类属性字段都读取
            'as_fields' =>'name:cate',                //name字段放到array()外面 方便读取使用，如果name和其他字段重名，可以写为'name:cate' 这样就是cate了
        )
    );
}