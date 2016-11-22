<?php
/**
 *说说控制器
 */
namespace Home\Controller;

use Think\Controller;

class PhotoController extends Controller{
    //photo相册列表

    //ViewPhoto 查看相册照片
    public function Viewp(){
        $id=$_GET['id'];

        $this->imgcate =M('img_cate')->where(array('id'=>$id))->select();
        $where = array('imgcid'=>$id);
        $albumphoto =M('albumphoto');
        $count = $albumphoto->where($where)->count();//统计一共多少张图片
        if($count){
            $Page = new \Think\Page($count,24);        //实例化分页类 传入总记录数和每页显示的记录数(15)
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $limit = $Page->firstRow.','.$Page->listRows;
            $list = $albumphoto->where($where)->order('img_time DESC')->limit($limit)->select();
            $Page -> setConfig('header','共%TOTAL_ROW%张图片');
            $Page -> setConfig('prev','上一页');
            $Page -> setConfig('next','下一页');
            $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
            $show = $Page->show();// 分页显示输出
            $this->assign('list',$list);//赋值数据集
            $this->assign('page',$show);//赋值分页输出
            $this->display();
        }else{
            $this->display('404');
        }
    }
}