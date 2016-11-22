<?php
/**
 *
 */
namespace Admin\Controller;

use Think\Controller;

class BlogController extends CommonController
{
    //博文列表
    public function index() {
        $this->blog =D('BlogRelation')->getBlogs();
        $this->display();
    }

    //删除到回收站/还原
    public function toTrach () {
        $type = (int) $_GET['type'];
        $msg = $type ? '删除': '还原';
        $update = array(
            'id' => (int) $_GET['id'],
            'del' => $type
        );
        if (M('blog')->save($update)) {
            $info['msg']=$msg.'成功';
            $info['iret'] = 0;
            $this->success($info);
        }else{
            $info['msg'] = $msg.'失败';
            $info['iret'] = 1;
            $this->error($info);

        }
    }
    //回收站
    public function trach () {
        $this->blog = D('BlogRelation')->getBlogs(1);
        $this->display('index');
    }

    //彻底删除
    public function delete () {
        $id = (int) $_GET['id'];
        if(D('BlogRelation')->relation('attr')->delete($id)){
            $this->success('删除成功',U(MODULE_NAME.'/Blog/trach'));
        }else{
            $this->error('删除失败');
        }
    }

    //添加博文
    public function blog() {
        //博文所属分类
        import('Class.Category', APP_PATH);
        $Category = new \Category();
        $cate = M('cate')->order('sort')->select();
        $this->cate = $Category::unlimitedForLevel($cate);

        //博文属性
        $this->attr = M('attr')->select();

        $this->display();
    }

    //编辑博文
    public function editBlog () {
        //博文所属分类
        import('Class.Category', APP_PATH);
        $Category = new \Category();
        $cate = M('cate')->order('sort')->select();
        $this->cate = $Category::unlimitedForLevel($cate);
        $this->blog =D('BlogRelation')->getBlog();

        $this->display('editBlog');
    }
    //修改博文表单处理
    public function editBlogHandle() {
        $id = (int) $_POST['id'];
        $where = array('id' => $id);
        $summary =$this->getSummary($_POST['content'],100);
        $data = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'summary' => $summary,
            'blogauther' => $_POST['blogauther'],
            'tags' => $_POST['tags'],
//            'time' => time(),
            'click' => (int)$_POST['click'],
            'cid' => (int)$_POST['cid'],
        );
        if(false !== D('BlogRelation')->relation(true)->where($where)->save($data)){
            $this->success('修改成功',U(MODULE_NAME.'/Blog/index'));
        }else {
            $this->error('修改失败');
        }

    }

    /**
     * 截取摘要
     * @param string $str 文本内容
     * @param int $num 截取字数
     * @param string $tail 截取后后面还有内容时显示的文字
     * @return string 返回摘要
     */
    public function getSummary($str,$num,$tail='...')
    {
        static $charset='utf-8'; // 编码，根据自己的修改，不过一般都是utf-8吧
        // 先strip_tags()去除html标签，再html_entity_decode()把html实体转成字符，ltrim是去除左边所有空格
        $str=ltrim(html_entity_decode(strip_tags($str),ENT_QUOTES,'utf-8'));
        if(mb_strlen($str,$charset)<=$num)
        {
            return $str;
        }
        else
        {
            return mb_substr($str,0,$num,$charset).$tail;
        }
    }

    //添加博文表单处理
    public function addBlog() {
        $summary =$this->getSummary($_POST['content'],100);
        $data = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'summary' => $summary,
            'blogauther' => $_POST['blogauther'],
            'tags' => $_POST['tags'],
            'time' => time(),
            'click' => (int)$_POST['click'],
            'cid' => (int)$_POST['cid'],
        );
        if(D('BlogRelation')->relation(true)->add($data)){
            $this->success('添加成功',U(MODULE_NAME.'/Blog/index'));
        }else {
            $this->error('添加失败');
        }
    }

    //编辑器图片上传处理
    public function uploadUe()
    {

        date_default_timezone_set("Asia/Chongqing");
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");
        $CONFIG_UE = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("./ueditor/php/config.json")), true);
        $action = $_GET['action'];
        switch ($action) {
            case 'config':
                $result = json_encode($CONFIG_UE);
                break;
            /* 上传图片 */
            case 'uploadimage':
                /* 上传涂鸦 */
            case 'uploadscrawl':
                /* 上传视频 */
            case 'uploadvideo':
                /* 上传文件 */
            case 'uploadfile':
                $config = array(
                    'mimes'         =>  array(), //允许上传的文件MiMe类型
                    'maxSize'       =>  3145728, //上传的文件大小限制 (0-不做限制)
                    'exts'          =>  array('jpg', 'gif', 'png', 'jpeg'), //允许上传的文件后缀
                    'autoSub'       =>  true, //自动子目录保存文件
                    'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
                    'rootPath'      =>  './Public/Uploads/', //保存根路径
                    'savePath'      =>  '', //保存路径
                    'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
                );
                $upload = new \Think\Upload($config);
                //$upload->maxSize = 3145728;                        //上传的文件大小限制 (0-不做限制)
                //$upload->rootPath = './Public/Uploads/';           //保存根路径
                //$upload->exts = array('jpg', 'gif', 'png', 'jpeg');//允许上传的文件后缀
                $info = $upload->upload();
                if (!$info) {
                    $result = json_encode(array(
                        'state' => $upload->getError(),
                    ));
                } else {

                    //添加水印
                    //$config_water= array(
                        //'img_path'=>C('water_img_path'),
                    //);
                    //$image = new \Think\Image();
                    //$image->open('./Public/Uploads/'. $info["upfile"]["savepath"] . $info["upfile"]['savename'])->water($config_water['img_path'])->save("./Public/Uploads/".$info["upfile"]["savepath"] . $info["upfile"]['savename']);

                    $url = __ROOT__ . "/Public/Uploads/" . $info["upfile"]["savepath"] . $info["upfile"]['savename'];
                    $result = json_encode(array(
                        'url' => $url,
                        'title' => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
                        'original' => $info["upfile"]['name'],//原文件名
                        'state' => 'SUCCESS'
                    ));
                }
                break;
        }
        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state' => 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }
    }
}