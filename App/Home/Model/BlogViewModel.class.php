<?php
/*
 * ÊÓÍ¼Ä£ÐÍ
 * */
namespace Home\Model;
use Think\Model\ViewModel;
class BlogViewModel extends ViewModel {
    protected $viewFields  = array(
        'blog' => array('id','title','time','click','summary','tags','blogauther','_type' => 'LEFT'),
        'cate' => array('name','_on' => 'blog.cid = cate.id'),
    );

    public function getAll($where,$limit) {

        return $this->where($where)->limit($limit)->order('time DESC')->select();
    }
}
