<?php
/**
 *
 */
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController{
    //分类列表视图
    public function index () {
        import('Class.Category',APP_PATH);
        $Category = new \Category();
        $cate=M('cate')->order('sort ASC')->select();
        $this->cate = $Category::unlimitedForLevel($cate,'&nbsp;&nbsp;>>&nbsp;');
        $this->display();
    }
    //添加分类视图
    public function addCate (){
        //$pid = isset($_GET['pid'])?$_GET['pid']:0;
        $this->pid = I('pid',0,'intval');
        $this->display();
    }
    //添加分类表单处理
    public function runAddCate () {
        if (M('cate')->add($_POST)) {
            $this->success('添加成功',U(MODULE_NAME.'/Category/index'));
        } else {
            $this->error('添加失败');
        }
    }

    //排序
    public function sortCate () {
        $db=M('cate');
        foreach ($_POST as $id => $sort) {
            $db->where(array('id' => $id))->setField('sort',$sort);
        }
        $this->success('排序修改成功');
//        $this->redirect(MODULE_NAME.'/Category/index');
    }
    //删除分类
    public function delCate () {
        $id = (int) $_GET['id'];
        $cate = M('cate')->order('sort')->select();
        import('Class.Category', APP_PATH);//载入分类文件
        $Category = new \Category();//实例化分类
        $cids = $Category::getChildsId($cate,$id);
        $cids[] = $id;
        foreach ($cids as $v){
            M('cate')->delete($v);
        }
        $this->success('删除成功');
    }

    //修改分类
    public function editCate () {
        $id = (int) $_GET['id'];
        $this->cate=M('cate')->where(array('id'=>$id))->select();
        $this->display('editCate');
    }
    //修改分类表单处理
    public function runEditCate () {
        $where = array('id'=>$_POST['id']);
        $data = array(
            'id'=>$_POST['id'],
            'name'=>$_POST['name'],
            'sort'=>$_POST['sort'],
            'pid'=>$_POST['pid']
        );
        if (M('cate')->where($where)->save($data)) {
            $this->success('修改成功',U(MODULE_NAME.'/Category/index'));
        } else {
            $this->error('修改失败');
        }
    }
}