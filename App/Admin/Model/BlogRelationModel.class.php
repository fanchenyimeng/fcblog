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
class BlogRelationModel extends RelationModel {

    //定义使用哪个主表
    protected $tableName = 'blog';

    //定义要管理哪些表
    protected $_link = array(
        'attr' => array(
            'mapping_type' => self::MANY_TO_MANY,//多对多关系
            'mapping_name' =>'attr',             //指定要关联模型的名称
            'foreign_key' => 'bid',              //主表在中间表中的字段名称
            'relation_foreign_key' =>'aid',      //中间表里哪个外键是来保存关联attr这个表的，即aid来保存attr的id
            'relation_table' => 'fc_blog_attr',  //中间表名称
        ),
        'cate' => array(
            'mapping_type' => self::BELONGS_TO,  //多对一关系。  一对多关系：HAS_MANY，反过来是多对一：BELONGS_TO  上面bolg是多，分类cate是一
            'foreign_key' => 'cid',              //主表在中间表中的字段名称
            'mapping_fields' =>'name',           //只读取分类名字name值，不加的话分类属性字段都读取
            'as_fields' =>'name:cate',                //name字段放到array()外面 方便读取使用，如果name和其他字段重名，可以写为'name:cate' 这样就是cate了
        )
    );

    public function getBlogs ($type = 0) {
        $field = array('del');
        $where = array('del' => $type);
        return $this->field($field,true)->where($where)->relation(true)->select();
    }

    public function getBlog () {
        $id = (int) $_GET['id'];
        $where = array('id' => $id);
        return $this->where($where)->relation(true)->select();
    }
}