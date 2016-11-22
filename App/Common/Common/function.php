<?php
function p($array){
    dump($array,1,'<pre>',0);
}

/**
 * ���ܣ����һ��Ŀ¼�Ƿ���ڣ��������򴴽���
 * @param string    $path      ������Ŀ¼
 * @return boolean
 */
function makeDir($path) {
    return is_dir($path) or (makeDir(dirname($path)) and @mkdir($path, 0777));
}

/**
 * ���ܣ����һ��Ŀ¼�Ƿ���ڣ�������ɾ����
 * @param string    $path      ������Ŀ¼
 * @return boolean
 */
function delDir($path) {
    if(is_file($path)){
        unlink($path);
        return;
    }

    $handle=opendir($path);
    while($filename=readdir($handle)){
        if($filename=='.' ||$filename=='..'){
            continue;
        }
        $new_path=$path.'/'.$filename;
        if(is_dir($new_path)){
            del_dir($new_path);
        }
        if(is_file($new_path)){
            unlink($new_path);
        }

    }
    closedir($handle);
    rmdir($path);
}