<?php
/**
 * ʹ��Widget���ߣ�����Զ����ǩ
 * ��ȡ���·������Ĺ��� *
 */
namespace Home\Widget;
use Think\Controller;
class NewWidget extends Controller {
    public function render ($data) {
        //��ҳ���·���������ʾ
        $limit = $data['limit'];
        $field = array('id,title,click,time,summary,blogauther,tags,del');//��ȡ���µ��ֶ�
        $where = array('del' => 0);//��ȡδɾ��������
        $data = M('blog')->field($field)->where($where)->order('time DESC')->limit($limit)->select();
        $this->assign('render',$data);
        $this->display('New:New',$data);
    }
}