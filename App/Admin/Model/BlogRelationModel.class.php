<?php

/**
 * ��Relation������ģ��
 * ��View��ʦͽģ��
 * ʲô������UserModel: ����ģ��
 */
/**
 * �û����ɫ����ģ��
 */
namespace Admin\Model;
use Think\Model\RelationModel;
class BlogRelationModel extends RelationModel {

    //����ʹ���ĸ�����
    protected $tableName = 'blog';

    //����Ҫ������Щ��
    protected $_link = array(
        'attr' => array(
            'mapping_type' => self::MANY_TO_MANY,//��Զ��ϵ
            'mapping_name' =>'attr',             //ָ��Ҫ����ģ�͵�����
            'foreign_key' => 'bid',              //�������м���е��ֶ�����
            'relation_foreign_key' =>'aid',      //�м�����ĸ���������������attr�����ģ���aid������attr��id
            'relation_table' => 'fc_blog_attr',  //�м������
        ),
        'cate' => array(
            'mapping_type' => self::BELONGS_TO,  //���һ��ϵ��  һ�Զ��ϵ��HAS_MANY���������Ƕ��һ��BELONGS_TO  ����bolg�Ƕ࣬����cate��һ
            'foreign_key' => 'cid',              //�������м���е��ֶ�����
            'mapping_fields' =>'name',           //ֻ��ȡ��������nameֵ�����ӵĻ����������ֶζ���ȡ
            'as_fields' =>'name:cate',                //name�ֶηŵ�array()���� �����ȡʹ�ã����name�������ֶ�����������дΪ'name:cate' ��������cate��
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