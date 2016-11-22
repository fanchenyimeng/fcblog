<?php
/**
 * �ݹ�
 * ���޼�����
 */
header("Content-Type:text/html;charset=UTF-8");
Class Category {
    //���һ������
    Static public function unlimitedForLevel ($cate,$html = '--',$pid = 0, $level = 0) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level + 1;
                $v['html'] = str_repeat($html,$level);
                $arr[] = $v;
                $arr = array_merge($arr,self::unlimitedForLevel($cate, $html, $v['id'],$level + 1));
            }
        }
        return $arr;
    }

    //���һ����ά����
    Static public function unlimitedForLayer ($cate,$name = 'child', $pid = 0) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
                $arr[] =$v;
            }
        }
        return $arr;
    }

    //����һ���ӷ���ID �������еĸ�������
    Static public function getParents ($cate, $id) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['id'] == $id) {
                $arr[] = $v;
                $arr = array_merge(self::getParents($cate, $v['pid']),$arr);
            }
        }
        return $arr;
    }

    //����һ����������ID ���������ӷ���ID
    Static public function getChildsId ($cate, $pid){
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] =$v['id'];
                $arr = array_merge($arr,self::getChildsId($cate, $v['id']));
            }
        }
        return $arr;
    }

    //����һ����������ID ���������ӷ���
    Static public function getChilds ($cate, $pid) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                $arr = array_merge($arr,self::getChilds($cate,$v['id']));
            }
        }
        return $arr;
    }
}