<?php
namespace SgIoc\Cache;
/**
 *
 * User: Administrator
 * Date: 2018/4/8
 * Time: 15:07
 */
class MemcachedConnector
{
    protected static $link;

    /**
     * 单例
     * @param $config
     * @return \Memcached
     */
    public static function getInstance($config)
    {
        if (!self::$link instanceof \Memcached) {
            self::$link = self::connect($config);
        }
        return self::$link;
    }

    /**
     * 连接
     * @param $config
     * @return \Memcached
     * @throws \Exception
     */
    protected static function connect($config)
    {
        if (!isset($config['hosts'])) {
            throw new \Exception('The ' . __METHOD__ . ' engine configure item does not have a hosts or port node.');
        }

        if (!extension_loaded('memcached')) {
            throw new \Exception('Memcached extension is not installed.');
        }
        $link = new \Memcached();
        $link->addServers($config['hosts']);
        if (isset($config['preFix'])) {
            $link->setOption(\Memcached::OPT_PREFIX_KEY, $config['preFix']);
        }
        if (isset($config['timeout'])) {
            $link->setOption(\Memcached::OPT_CONNECT_TIMEOUT, $config['timeout']);
        }
        if (isset($config['is_zip'])) {
            $link->setOption(\Memcached::OPT_COMPRESSION, $config['is_zip']);
        }
        return $link;
    }
}