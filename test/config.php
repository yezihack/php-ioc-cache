<?php
/**
 * 配置文件
 * User: freelife2020@163.com
 * Date: 2018/3/27
 * Time: 15:53
 */
return array(
    'default'  => 'file',
    'file'     => array(//文件存储引擎
        'expired'   => 7200,//默认存储时间
        'path'      => __DIR__ . '/storage/',//存储目录,必须可写
        'is_zip'    => 0,//是否开启压缩
        'zip_level' => 6,//压缩等级0~10
    ),
    'memcache' => array(//memcache存储引擎
        'host' => '127.0.0.1',//memcache地址
        'port' => 11211,//memcache端口
    ),
);