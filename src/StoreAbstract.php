<?php

namespace SgIoc\Cache;
/**
 * 存储抽象类
 * User: freelife2020@163.com
 * Date: 2018/3/26
 * Time: 16:02
 */
abstract class StoreAbstract
{
    protected $app;
    protected $config = array(//默认配置
        'preFix'    => '',//前缀
        'expired'   => 7200,//存储时间,分钟
        'is_zip'    => 0,//是否压缩
        'zip_level' => 6, //压缩等级
    );

    /**
     * 判断键是否存在
     * @param $key
     * @return mixed
     */
    abstract public function has($key);

    /**
     * add 方法只会在缓存项不存在的情况下添加数据到缓存，如果数据被成功添加到缓存返回 true，否则，返回false：
     * @param $key
     * @param $value
     * @param $minutes
     * @return mixed
     */
    abstract public function add($key, $value, $minutes);

    /**
     * 设置缓存,存在则覆盖,不存在则创建,成功返回true
     * @param $key
     * @param $value
     * @param $minutes
     * @return mixed
     */
    abstract public function put($key, $value, $minutes);

    /**
     * 获取缓存
     * @param $key
     * @return mixed
     */
    abstract public function get($key);

    /**
     * 获取缓存&删除
     * @param $key
     * @return mixed
     */
    abstract public function pull($key);

    /**
     * 永久缓存
     * @param $key
     * @param $value
     * @return mixed
     */
    abstract public function forever($key, $value);

    /**
     * 清理所有缓存
     * @return mixed
     */
    abstract public function flush();

    /**
     * 删除缓存
     * @param $key
     * @return mixed
     */
    abstract public function forget($key);

    /**
     * 递增
     * @param $key
     * @param int $value
     * @return mixed
     */
    abstract public function increment($key, $value = 1);

    /**
     * 递减
     * @param $key
     * @param int $value
     * @return mixed
     */
    abstract public function decrement($key, $value = 1);

    /**
     * 如果缓存项不存在，传递给 remember 方法的闭包被执行并且将结果存放到缓存中
     * @param $key
     * @param $minutes
     * @param mixed $callback
     * @return mixed
     */
    abstract public function remember($key, $minutes, $callback);

    /**
     * 永久缓存,如果缓存项不存在，传递给 remember 方法的闭包被执行并且将结果存放到缓存中
     * @param $key
     * @param mixed $callback
     * @return mixed
     */
    abstract public function rememberForever($key, $callback);

    /**
     * 获取带前缀的键
     * @param $key
     * @return mixed
     */
    abstract public function getKey($key);

    /**
     * 获取详情
     * @return mixed
     */
    abstract public function info();

    /**
     * 判断是否是匿名函数还是普通的值
     * @param $value
     * @return mixed
     */
    public function value($value)
    {
        return $value instanceof \Closure ? $value() : $value;
    }

}