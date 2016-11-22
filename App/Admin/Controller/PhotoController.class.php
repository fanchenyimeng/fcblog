<?php
/**
 *说说控制器
 */
namespace Admin\Controller;

use Think\Controller;

class PhotoController extends CommonController
{
    //相册列表
    public function index() {
        //读取相册列表
        import('Class.Category', APP_PATH);
        $Category = new \Category();
        $imgcate = M('img_cate')->select();
        $this->imgcate = $Category::unlimitedForLevel($imgcate);
        $this->display();
    }

    //设置相册封面
    public function photobg(){
        $id =(int)$_POST['imgcid'];
        $where = array('id'=>$id);
        $data = array(
            'imgbg'=>$_POST['imgbg']
        );
        if(!empty($id)){
            $str=M('img_cate')->where($where)->save($data);
            if($str){
                $this->success('设置成功');
            }else{
                $this->error('设置失败');
            }
        }else{
            $this->error('照片不存在');
        }
    }

    //上传图片视图
    public function addPhoto() {
        //读取相册列表
        import('Class.Category', APP_PATH);
        $Category = new \Category();
        $imgcate = M('img_cate')->select();
        $this->imgcate = $Category::unlimitedForLevel($imgcate);
        $this->display();
    }

    //查看相册图片视图
    public function ViewPhoto(){
        $id=$_GET['id'];
        $result=M('albumphoto')->where(array('imgcid'=>$id))->find();
        $this->imgcate =M('img_cate')->where(array('id'=>$id))->select();
        $where = array('imgcid'=>$id);
        $albumphoto =M('albumphoto');
        $count = $albumphoto->where($where)->count();//统计一共多少张图片
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
        if(empty($result)){
            $this->error('还没有照片，请上传照片！',U(MODULE_NAME.'/Photo/index'));
        }
        $this->display();
    }

    //删除图片
    public function delPhoto(){
        $id =(int)$_GET['id'];
        $imgcid =I('cid',0,intval);
        $albumdb = M('albumphoto')->where(array('id'=>$id))->select();
        foreach($albumdb as $k=>$v){
            $path =$v['img_path'];
            $imgpath = 'Public'.$path;//照片地址
            $tpath = $v['thumb'];
            $delimg = unlink($imgpath);//删除照片文件
            $deltpath = unlink($tpath);//删除照片缩略图
            if($delimg == true && $deltpath == true) {
                M('img_cate')->where(array('id'=>$imgcid))->setDec('photonum',1);//所属相册照片数量减一
                $str = M('albumphoto')->where(array('id'=>$id))->delete();       //删除数据库数据
                if($str){
                    $this->success('删除成功！');
                }else{
                    $this->error('删除失败！');
                }
            }else{
                //若图片已被删，但数据未删除，则删除数据
                M('albumphoto')->where(array('id'=>$id))->delete();
                $this->success('删除成功！');
            }
        }

        //清空原权限
//        $db->where(array('role_id' => $rid))->delete();
    }

    //编辑图片描述视图
    public function editPhoto(){
        $id=(int)$_GET['id'];
        $where = array('id'=>$id);
        $this->imgp=M('albumphoto')->where($where)->select();
        $this->display();
    }

    //编辑图片描述
    public function runEditPhoto(){
        $id=(int)$_GET['id'];
        $where = array('id'=>$id);
        $data=array(
            'img_content'=>$_POST['content'],
        );
        if(M('albumphoto')->where($where)->save($data)){
            $this->success('修改成功',U(MODULE_NAME.'/Photo/index'));
        }else{
            $this->error('修改失败');
        }
    }

    //创建相册视图
    public function addImgCate (){
        $this->display();
    }

    //创建相册表单处理
    public function runPhotoCate () {
        //自动验证规则
        $rules = array(
            array('img_cate_name','','相册已存在！',0,'unique',1) // 在新增的时候验证name字段是否唯一
        );
        $cate=M('img_cate');

        $data = array(
            'img_cate_name' =>$_POST['name'],
            'img_cate_content' =>$_POST['content'],
            'img_cate_sort' =>$_POST['sort'],
        );

        if(!$cate->validate($rules)->create($data)){//验证相册是否存在
            exit($cate->getError());//返回报错信息
        }else{//不存在则进行其他操作
            M('img_cate')->add($data);
            $this->success('添加成功');
        }
    }

    //修改相册视图
    public function editImgCate(){
        $id =(int)$_GET['id'];
        $where = array('id'=>$id);
        $this->imgcate = M('img_cate')->where($where)->select();

        $this->display();
    }
    //修改相册表单处理
    public function runEidtImgCate(){
        $id =(int)$_GET['id'];
        $where = array('id'=>$id);
        $data = array(
            'img_cate_name'=>$_POST['name'],
            'img_cate_content'=>$_POST['content'],
            'img_cate_sort'=>$_POST['sort']
        );
        if(M('img_cate')->where($where)->save($data)){
            $this->success('修改成功',U(MODULE_NAME.'/Photo/index'));
        }else{
            $this->error('修改失败！');
        }

    }

    //删除相册&删除相册内所有图片&删除本地图片和缩略图
    public function delPhotoCate () {
        $id = (int)$_GET['id'];
        $msg = '删除';
        $albumdb = M('albumphoto')->where(array('imgcid'=>$id))->select();

        if (!empty($id)) {
            if (M('img_cate')->where(array('id' => $id))->delete()) {
//                M('albumphoto')->where(array('imgcid'=>$id))->delete();
                $albumdb = M('albumphoto')->where(array('imgcid'=>$id))->select();

                foreach ($albumdb as $k => $v) {
                    $path = $v['img_path'];
                    $imgpath = 'Public' . $path;//照片地址
                    $tpath = $v['thumb'];
                    unlink($imgpath);//删除照片文件
                    unlink($tpath);//删除照片缩略图
                    M('albumphoto')->where(array('imgcid'=>$id))->delete();
                }
                $info['msg'] = $msg . '成功';
                $info['iret'] = 0;
                $this->success($info);
            } else {
                $info['msg'] = $msg . '失败';
                $info['iret'] = 1;
                $this->error($info);
            }
        } else {
            $this->error('相册不存在！', U(MODULE_NAME . '/Photo/index'));
        }
    }

    //上传图片表单处理
    public function uploadPhoto(){
        $id = $_POST['cid'];
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'      =>  './Public/', //保存根路径
            'savePath'   =>   '/Uploads/',
            'autoSub'    =>    true,
            'subName'    =>   array('date','Ymd')
        );
        $upload = new \Think\Upload($config);// 实例化上传类
        // 上传文件
        $info = $upload->upload();
        $path=$info['file']['savepath'].$info['file']['savename'];

        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else {// 上传成功
            $image = new \Think\Image();
            $image->open('./Public/'.$path);
            $tpath = 'Public/thumb/'.$info['file']['savename'];
            $image->thumb(243,162)->save('./'.$tpath);
            $data =array(
                'img_path' =>$path,
                'imgcid' => (int)$_POST['cid'],
                'img_time' => time(),
                'thumb' =>$tpath,
            );
//            p($data);
//            die();
            M('img_cate')->where(array('id'=>$id))->setInc('photonum',1);
            M('albumphoto')->add($data);
            $this->success('上传成功！');
        }
    }

}