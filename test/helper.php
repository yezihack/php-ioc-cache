<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 12:37
 */

/**
 * 打印
 */
function dump($arg1 = '', $arg2 = '')
{
    $params = func_get_args();
    ob_start();
    echo '<pre>';
    foreach ($params as $val) {
        var_dump($val);
    }
    echo '</pre>';
    $con = ob_get_contents();
    ob_clean();
    echo $con;
}