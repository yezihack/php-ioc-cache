<?php
/**
 * 注册自动加载函数
 * User: freelife2020@163.com
 * Date: 2018/3/27
 * Time: 9:33
 */
spl_autoload_register(function ($className) {
    $namespace = 'SgIoc\\Cache';
    if (strpos($className, $namespace) === 0) {
        $fileName = str_replace($namespace, '', $className);
        $fileName = str_replace('\\', '/', __DIR__ . '/src' . $fileName . '.php');
        if (is_file($fileName)) {
            require($fileName);
        }
    }
});