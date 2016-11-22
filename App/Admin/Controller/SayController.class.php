<?php
/**
 *说说控制器
 */
namespace Admin\Controller;

use Think\Controller;

class SayController extends CommonController
{
    //说说列表
    public function index() {
        $this->saying =M('saying')->order('say_time DESC')->select();
        $this->display();
    }

    //删除说说表单处理
    public function delSay () {
        $id = (int) $_GET['id'];
        if (M('saying')->delete($id)) {
            $info['msg']='删除成功';
            $info['iret'] = 0;
            $this->success($info);
        }else{

            $info['msg'] = '删除失败';
            $info['iret'] = 1;
            $this->error($info);
        }
    }

    //添加说说表单处理
    public function addSay() {
        $data = array(
            'say_content' => $_POST['content'],
            'say_time' => time()
            //'say_img_path' => (int)$_POST['click'], //图片地址
        );
        if(M('saying')->add($data)){
            $this->success('添加成功',U(MODULE_NAME.'/Say/index'));
        }else {
            $this->error('添加失败');
        }
    }
}