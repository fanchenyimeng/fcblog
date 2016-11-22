<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
    public function index(){

        $id = (int) $_GET['id'];
        $cate = M('cate')->order('sort')->select();
        import('Class.Category', APP_PATH);//载入分类文件
        $Category = new \Category();//实例化分类
        $cids = $Category::getChildsId($cate,$id);
        $cids[] = $id;

        $where = array('cid' => array('IN',$cids));

        $count = M('blog')->where($where)->count();//统计一共多少条博文
        if($count){
            $Page = new \Think\Page($count,10);        //实例化分页类 传入总记录数和每页显示的记录数(10)
            $limit = $Page->firstRow.','.$Page->listRows;
            $Page -> setConfig('header','共%TOTAL_ROW%条记录');
            $Page -> setConfig('prev','上一页');
            $Page -> setConfig('next','下一页');
            $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
            $show = $Page->show();// 分页显示输出

            $blog = D('BlogView')->getAll($where,$limit);
            $this->assign('blog',$blog);//赋值数据集
            $this->assign('page',$show);//赋值分页输出
            $this->blog=$blog;
            $this->display();
        }else{
            $this->display('404');
        }
    }
}