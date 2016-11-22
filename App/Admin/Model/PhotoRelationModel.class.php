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
class PhotoRelationModel extends RelationModel {

    //����ʹ���ĸ�����
    protected $tableName = 'albumphoto';

    //����Ҫ������Щ��
    protected $_link = array(

        'img_cate' => array(
            'mapping_type' => self::BELONGS_TO,  //���һ��ϵ��  һ�Զ��ϵ��HAS_MANY���������Ƕ��һ��BELONGS_TO  ����bolg�Ƕ࣬����cate��һ
            'foreign_key' => 'imgpid',              //�������м���е��ֶ�����
            'mapping_fields' =>'img_cate_name',           //ֻ��ȡ��������nameֵ�����ӵĻ����������ֶζ���ȡ
            'as_fields' =>'name:cate',                //name�ֶηŵ�array()���� �����ȡʹ�ã����name�������ֶ�����������дΪ'name:cate' ��������cate��
        )
    );
}