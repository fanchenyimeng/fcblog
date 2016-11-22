<?php
/*
 * �Զ����ǩ��
 * */
namespace Think\Template\TagLib;    //��ǰ�ļ����ڵ�Ŀ¼
use Think\Template\TagLib;    //Template�µ�TagLib.class.php�ļ�
Class TagLibFc extends TagLib {
    protected $tags   =  array(
        'nav' => array('attr' => 'order','close' => 1),// ����widget���ߣ����Զ����ǩnav
        'hot' => array('attr' => 'limit','close' =>1),// ����widget���ߣ����Զ����ǩhot
        'flin' => array('attr' => 'limit','close' =>1),// ����widget���ߣ����Զ����ǩflin
        'new' => array('attr' => 'limit','close' =>1),// ����widget���ߣ����Զ����ǩnew
        'photo' => array('attr' => 'limit','close' =>1),// ����widget���ߣ����Զ����ǩphoto
        'phocate' => array('attr' => 'limit','close' =>1),// ����widget���ߣ����Զ����ǩphocate
        'uif' => array('attr' => 'limit','close' =>1)// ����widget���ߣ����Զ����ǩuinfo
    );

    //��ҳ��һ���û���Ϣ
    public function _uif ($attr, $content){
        $str = <<<str
<?php
        \$field = array("nickname","IconPath");
        \$_uif=M("user")->where(array('id'=>1))->field(\$field)->limit({$attr['limit']})->select();
        foreach (\$_uif as \$_uif_value):
        extract(\$_uif_value);
?>
str;

        $str .=$content;
        $str .='<?php endforeach;?>';
        return $str;
    }

    //listҳ�Զ����ǩ ����
    public function _nav ($attr,$content) {
        $str = <<<str
<?php
    \$_nav_cate = M('cate')->order("{$attr['order']}")->select();
    import('Class.Category', APP_PATH);
    \$Category = new \Category();
    \$_nav_cate = \$Category::unlimitedForLayer(\$_nav_cate);
    foreach (\$_nav_cate as \$_nav_cate_v):
        extract(\$_nav_cate_v);
        if(\$id==31){
        \$url = U('/about/'.\$id);
        }
        else if(\$id==33){
            \$url = U('/doing/'.\$id);
        }else if(\$id==36){
            \$url = U('/photo/'.\$id);
        }else{
            \$url = U('/blog/'.\$id);
        }
?>
str;
        $str .=$content;
        $str .='<?php endforeach;?>';
        return $str;
    }

    //hot�Զ����ǩ��ȡ��������
    public function _hot ($attr, $content){
        $str = <<<str
<?php
        \$where = array('del' => 0);
        \$field = array("id","title","click");
        \$_hot_blog=M("blog")->field(\$field)->where(\$where)->limit({$attr['limit']})->order("click DESC")->select();
        foreach (\$_hot_blog as \$_hot_value):
        extract(\$_hot_value);
        \$url = U("/hot/".\$id);
?>
str;

        $str .=$content;
        $str .='<?php endforeach;?>';
        return $str;
    }

    //new�Զ����ǩ��ȡ��������
    public function _new ($attr, $content){
        $str = <<<str
<?php
        \$field = array("id","title");
        \$where = array('del' => 0);
        \$_new_blog=M("blog")->field(\$field)->where(\$where)->limit({$attr['limit']})->order("time DESC")->select();
        foreach (\$_new_blog as \$_new_value):
        extract(\$_new_value);
        \$url = U("/news/".\$id);
?>
str;

        $str .=$content;
        $str .='<?php endforeach;?>';
        return $str;
    }

    //photo�Զ����ǩ��ȡ������Ƭ
    public function _photo ($attr, $content){
        $str = <<<str
<?php
        \$field = array("id","img_path","img_content");
        \$_photo=M("albumphoto")->field(\$field)->limit({$attr['limit']})->order("img_time DESC")->select();
        foreach (\$_photo as \$_photo_value):
        extract(\$_photo_value);
?>
str;

        $str .=$content;
        $str .='<?php endforeach;?>';
        return $str;
    }

    //phocate�Զ����ǩ��ȡ����б�
    public function _phocate ($attr, $content){
        $str = <<<str
<?php
        \$field = array("id","img_cate_name","img_cate_content","photonum","imgbg");
        \$_phocate=M("img_cate")->field(\$field)->limit({$attr['limit']})->order("img_cate_sort DESC")->select();
        foreach (\$_phocate as \$_phocate_value):
        extract(\$_phocate_value);
?>
str;

        $str .=$content;
        $str .='<?php endforeach;?>';
        return $str;
    }

    //flin�Զ������������ӱ�ǩ��ȡ��������
    public function _flin ($attr,$content) {
        $str = <<<str
<?php
        \$field = array("id","flinkname","flink");
        \$_flin_flink =M('flink')->field(\$field)->limit({$attr['limit']})->order("id DESC")->select();
        foreach (\$_flin_flink as \$_flin_value):
        extract(\$_flin_value);
        \$url = \$flink;
?>
str;
        $str .= $content;
        $str .= '<?php endforeach;?>';
        return $str;
    }

}

