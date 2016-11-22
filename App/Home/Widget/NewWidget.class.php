<?php
/**
 * 使用Widget工具，完成自定义标签
 * 读取最新发布博文工具 *
 */
namespace Home\Widget;
use Think\Controller;
class NewWidget extends Controller {
    public function render ($data) {
        //首页最新发布博文显示
        $limit = $data['limit'];
        $field = array('id,title,click,time,summary,blogauther,tags,del');//读取文章的字段
        $where = array('del' => 0);//读取未删除的文章
        $data = M('blog')->field($field)->where($where)->order('time DESC')->limit($limit)->select();
        $this->assign('render',$data);
        $this->display('New:New',$data);
    }
}