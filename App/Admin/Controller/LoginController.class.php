<?php
/**
 *
 */
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    /**
     * 首页视图
     */
    public function index(){

        $this->display();
    }


    //登录表单操作
    public function login(){

        if(!IS_POST){
            $this->error('页面不存在');
        }
        $code=$_POST['code'];
        if(!$this->check_verify($code)){
            $this->error('验证码错误');
        }

        $user=M('user')->where(array('username'=>I('username')))->find();
        if (!$user || $user['password'] != I('password','','md5')) {
            $this->error('账号或密码错误,请重新输入');
        }

        //更新最后一次登录的时间与IP
        $data = array(
            'id' => $user['id'],
            'logintime' => time(),
            'loginip' => get_client_ip(),
        );
        M('user')->save($data);

        session('uid',$user['id']);
        session('username',$user['username']);
        session('nickname',$user['nickname']);
        session('path',$user['iconpath']);
        session('logintime',date('Y-m-d H:i:s',$user['logintime']));
        session('loginip',$user['loginip']);
        $this->redirect('Admin/Index/index');
    }


    //验证码
    public function verify(){
        $config =    array(
            'expire'    =>  C('expire'),            // 验证码过期时间（s）
            'fontSize'  =>  C('fontSize'),          // 验证码字体大小(px)
            'useCurve'  =>  false,          // 是否画混淆曲线
            'useNoise'  =>  true,          // 是否添加杂点
            'imageH'    =>  C('imageH'),            // 验证码图片高度
            'imageW'    =>  C('imageW'),            // 验证码图片宽度
            'length'    =>  C('length'),            // 验证码位数
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}