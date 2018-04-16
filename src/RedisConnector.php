<?php

namespace SgIoc\Cache;

/**
 * Redis连接对象
 * User: freelife2020@163.com
 * Date: 2018/4/16
 * Time: 11:45
 */
class RedisConnector
{
    protected static $link;

    /**
     * 单例
     * @param $config
     * @return \Redis
     */
    public static function getInstance($config)
    {
        if (!self::$link instanceof \Redis) {
            self::$link = self::connect($config);
        }
        return self::$link;
    }

    /**
     * 连接
     * @param $config
     * @return \Redis
     * @throws \Exception
     */
    protected static function connect($config)
    {
        if (!isset($config['host'])) {
            throw new \Exception('The ' . __METHOD__ . ' engine configure item does not have a host or port node.');
        }

        if (!extension_loaded('redis')) {
            throw new \Exception('Redis extension is not installed.');
        }
        $link = new \Redis();
        $link->connect($config['hosts']);
        if (isset($config['auth']) && $config['auth'] != '') {
            $link->auth($config['auth']);
        }
        if (isset($config['preFix']) && $config['preFix'] != '') {
            $link->setOption(\Redis::OPT_PREFIX, $config['preFix']);
        }
        if (extension_loaded('igbinary')) {
            $link->setOption(\Redis::OPT_SERIALIZER, \Redis::SERIALIZER_IGBINARY);
        }
        return $link;
    }
}