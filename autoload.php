<?php
/**
 * Created by PhpStorm.
 * User: Administrator
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