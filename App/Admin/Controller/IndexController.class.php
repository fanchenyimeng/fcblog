<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台首页控制器
 */
class IndexController extends CommonController {
    /**
     * 首页视图
     */
    public function index(){
        $this->display();
    }
    /**
     * 首页总视图
     */
    public function indexmain(){
        $this->display();
    }

    //修改头像
    public function icon () {
        $this->display('form_avatar');
    }
    //个人资料
    public function Profile () {
        $this->display('Profile');
    }
    //联系我们
    public function contacts () {
        $this->display('contacts');
    }

    //退出登录
    public function logout() {
        session_unset();
        session_destroy();
        $this->redirect('Admin/Login/index');
    }

    /**
     * 上传头像  【此处可以更改成3张图】如果需要可以联系我
     */
    public function uploadImg(){
        if (IS_POST) {
            header('Content-Type: text/html; charset=utf-8');
            $result = array();
            $id = $_GET["id"];
            $msg = '';
            $path='Public/Admin/Uploads'.'/avatar/'.$id.'/';
            if (file_exists($path)) {
                delDir($path);
            }
            $avatars = array("__avatar1");
            $avatar = $_FILES[$avatars['0']];
            if ($avatar['error'] > 0 ){
                $msg .= $avatar['error'];
            }

            if(!file_exists($path)){
                makeDir($path);
            }
            $savePath = $path . $id . ".jpg";
            if(move_uploaded_file($avatar["tmp_name"], $savePath)){
                $data =array(
                    'IconPath'=>$savePath,
                );
                M('user')->where($id)->save($data);
                $result['msg'] = $msg;
                $result['success'] = true;
                echo json_encode($result);

            }else{
                $result['success'] = false;
            }
        }
    }
}