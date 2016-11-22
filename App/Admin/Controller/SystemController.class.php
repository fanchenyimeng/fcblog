<?php
/**
 *
 */
namespace Admin\Controller;
use Think\Controller;
class SystemController extends Controller{

    public function verify () {
        $this->display();
    }

    //更新验证码配置文件
    public function updateVerify ()
    {
        if (\Think\Storage::put(CONF_PATH.'verify.php','<?php  return  '.var_export($_POST,true).';','F')){
            $this->success('修改成功！');
        } else {
            $this->error('修改失败');
        }
    }
    //设置网站网站首页标题
    public function setTitle(){
        $this->display('title');
    }

    //设置首页背景大图
    public function bgimg(){
        if (\Think\Storage::put(CONF_PATH.'bgimg.php','<?php  return  '.var_export($_POST,true).';','F')){
            $this->success('修改成功！');
        } else {
            $this->error('修改失败');
        }
    }


    //更新标题
    public function setTitles(){
        if (\Think\Storage::put(CONF_PATH.'title.php','<?php  return  '.var_export($_POST,true).';','F')){
            $this->success('修改成功！');
        } else {
            $this->error('修改失败');
        }
    }

    //数据库设置视图
    public function  set(){
        $this->display();
    }
    //数据库设置
    public function  runset(){
        if (\Think\Storage::put(CONF_PATH.'set.php','<?php  return  '.var_export($_POST,true).';','F')){
            $this->success('修改成功！');
        } else {
            $this->error('修改失败');
        }
    }

    //更新水印图片
    public function water () {
        $this->display();
    }
    public function updateWater ()
    {
        if (\Think\Storage::put(CONF_PATH.'water.php','<?php  return  '.var_export($_POST,true).';','F')){
            $this->success('修改成功！');
        } else {
            $this->error('修改失败');
        }
    }
}
