<?php
/*
 * 首页
 * */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if (!$list = S('index_list')){
            $list = M('cate')->where(array('pid'=>0))->order('sort')->select();

            import('Class.Category', APP_PATH);
            $Category = new \Category();
            $cate =M('cate')->order('sort')->select();

            $db = M('blog');
            $field = array('id','title','time');//需要读取的字段
            foreach ($list as $k => $v){
                $cids = $Category::getChildsId($cate,$v['id']);
                $cids[] = $v['id'];
                $where = array('cid' => array('IN',$cids));
                $list[$k]['blog'] = $db->field($field)->where($where)->order('time DESC')->select();
            }
            //缓存  缓存名称index_list  缓存数据$list 缓存时间10秒
            S('index_list',$list,10);
        }
        $this->cate=$list;
        $this->display();
    }
}
