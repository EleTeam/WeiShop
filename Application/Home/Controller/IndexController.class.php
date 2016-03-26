<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        phpinfo();

        $arr = [7, 3, 7, 9, 0, 2, 3];
        $arr = $this->bubbleSort($arr);
        //print_r($arr);
        echo $b;
        $a;
        exit;
    }

    //冒泡排序: 内循环两两相比较，把小的往前移
    function bubbleSort($arr) {
        $count = count($arr);
        for ($i=0; $i<$count-1; $i++) {
            for ($j=$count-1; $j>$i;  $j--) {
                if ($arr[j] < $arr[j-1]) {
                    $tmp = $arr[j-1];
                    $arr[j-1] = $arr[i];
                    $arr[i] = $tmp;
                }
            }
        }
        return $arr;
    }
    //选择排序：假定每次外循环的第一个值是当前最小的
    function selectSort($arr) {
        $count = count($arr);
        for ($i=0; $i<$count-1; $i++) {
            //假设最小值的位置
            $tmp = $arr[i];
            $pos = $i;
            for ($j=$count-1; $j>$i; $j--) {
                if ($arr[$j] < $tmp) {
                    $pos = $j;
                }
            }
            if ($pos != $i) {
                $arr[i] = $arr[pos];
                $arr[pos] = $tmp;
            }
        }
    }
    //插入排序：假设前面已经排序好了，在已排序序列中从后向前扫描，大的元素向后移，直到找到小于或者等于的元素
    //因为内循环不用扫描前面排好序的所有元素，所有内循环用while而不用for
    function insertSort($arr) {
        $count = count(arr);
        for ($i=1; $i<count; $i++) {
            $item = $arr[$i];
            $pos = $i;
            while ($pos>0 && $item<$arr[pos-1]) {
                $arr[$i] = $arr[pos-1];
                $pos--;
            }
            if ($pos != $i) {
                $arr[pos] = $item;
            }
        }
    }
    //快速排序：选择轴值，左右两边同时扫描直到确认轴值位置
    function quickSort($arr, $left, $right) {
        if ($left < $right) {
            $item = $arr[left]; //选择轴值
            $i = $left + 1;
            $j = $right;

            //小于等于轴值的放到左边，大于的放到右边，确定轴值的所处位置
            while ($i < $j) {
                while ($i<=$j && $arr[i]<=$item) //从左边扫描直到找到比轴值大的为止
                    $i++;
                while ($i<=$j && $arr[j]>$item) //从右边扫描直到找到比轴值小的为止
                    $j--;
                if ($i < $j) {
                    $tmp = $arr[i];
                    $arr[i] = $arr[j];
                    $arr[j] = $tmp;
                }
            }

            $arr[left] = $arr[j];
            $arr[j] = $item;

            quickSort($arr, left, $j-1);
			quickSort($arr, $j+1, $right);
		}
    }

    function listDir($dir) {
        if (!is_dir($dir))
            return;

        $files = array();
        $handle = opendir($dir);
        //print $handle;
        if (!$handle) {
            //print readdir($handle);
            return;

        }


        while (($file = readdir($handle)) !== false) {
            ///print $file;
            if ($file == '.' || $file == '..')
                return;
            if (is_dir($file)) {
                echo $dir;
                $files[] = $dir;
                $files[] = listDir($dir);
            } else {
                $files[] = $dir . '/' . $file;
            }
        }

        closedir($handle);
    }
}