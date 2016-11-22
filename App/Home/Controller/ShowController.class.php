<?php
namespace Home\Controller;
use Think\Controller;
class ShowController extends Controller {
    public function index(){
        $id = (int) $_GET['id'];

        M('blog')->where(array('id'=>$id))->setInc('click');//设置点击加1；setInc()指定哪个字段加1， setDec（） 设置字段值减1
        $field = array('id','title','time','click','content','cid','blogauther','tags');//设置读取的字段
        $db=M('blog')->field($field)->find($id);
        if(!empty($db)){
            $this->blog = M('blog')->field($field)->find($id);
            $cid = $this->blog['cid'];
            $cate = M('cate')->order('sort')->select();
            import('Class.Category', APP_PATH);
            $Category = new \Category();
            $this->parent = $Category::getParents($cate,$cid);//getParents根据子分类返回所有父级分类
            $this->display();
        }else{
            $this->display('404');
            exit();
        }
    }

    //阅读统计
    public function clickNum(){
        $id = (int)$_GET['id'];
        $where =array('id'=>$id);
        $click = M('blog')->where($where)->getField('click');
        M('blog')->where($where)->setInc('click');//设置点击加1；setInc()指定哪个字段加1， setDec（） 设置字段值减1

        echo 'document.write('.$click.')';
    }

    //关于我
    public function about(){
        $id = (int) $_GET['id'];
        $where = array('cid' => $id);
        $db=M('blog')->where($where)->find();
        if(!empty($db) && $id ==31){
            $this->about = M('blog')->where($where)->find();
            $this->display();
        }else{
            $this->display('404');
            exit();
        }

    }

    //碎言碎语
    public function doing(){
        $count = M('saying')->count();//统计一共多少条说说
        $Page = new \Think\Page($count,10);        //实例化分页类 传入总记录数和每页显示的记录数(15)
        $limit = $Page->firstRow.','.$Page->listRows;
        $Page -> setConfig('header','共%TOTAL_ROW%条记录');
        $Page -> setConfig('prev','上一页');
        $Page -> setConfig('next','下一页');
        $Page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $show = $Page->show();// 分页显示输出
        $saying = M('saying')->limit($limit)->order('say_time DESC')->select();
        $this->assign('say',$saying);//赋值数据集
        $this->assign('page',$show);//赋值分页输出
        $this->saying=$saying;
        $this->display();
    }

    //格式化友好显示时间
    public function showTime($time){
        $time=$_POST['time'];
        $now=time();
        $day=date('Y-m-d',$time);
        $today=date('Y-m-d');

        $dayArr=explode('-',$day);
        $todayArr=explode('-',$today);

        //距离的天数，这种方法超过30天则不一定准确，但是30天内是准确的，因为一个月可能是30天也可能是31天
        $days=($todayArr[0]-$dayArr[0])*365+(($todayArr[1]-$dayArr[1])*30)+($todayArr[2]-$dayArr[2]);
        //距离的秒数
        $secs=$now-$time;

        if($todayArr[0]-$dayArr[0]>0 && $days>3){//跨年且超过3天
            return date('Y-m-d',$time);
        }else{

            if($days<1){//今天
                if($secs<60)return $secs.'秒前';
                elseif($secs<3600)return floor($secs/60)."分钟前";
                else return floor($secs/3600)."小时前";
            }else if($days<2){//昨天
                $hour=date('h',$time);
                return "昨天".$hour.'点';
            }elseif($days<3){//前天
                $hour=date('h',$time);
                return "前天".$hour.'点';
            }else{//三天前
                return date('m月d号',$time);
            }
        }
    }
}