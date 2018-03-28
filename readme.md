# php-ico-cache php注入缓存

注入缓存 php >= 5.3.0 因为5.3支持匿名函数,项目里有使用匿名函数

采用注入方法实现缓存,可以自由扩展,只需要继承StoreAbstract

## 文件列表
- src/Cache.php 缓存入口类及注册
- src/CacheContainer.php 依赖注入容器
- src/CacheManager.php 缓存服务管理
- src/StoreAbstract.php 存储抽象类
- src/FileStore 文件存储引擎
- src/MemcacheStore memcache存储引擎

## 功能列表
- [常用操作](test/exa-simple.php)
- [写入缓存 put($key, $value, $minutes)/add($key, $value, $minutes)](test/exa-add-put.php)
- [读取缓存 get($key)/pull($key)](test/exa-get-pull.php)
- [判断缓存是否存在 has($key)](test/exa-has.php)
- [永久缓存 forever($key, $value)](test/exa-forever.php)
- [写入&读取 remember($key, $minutes, $value)](test/exa-remember.php)
- [永久写入&读取 rememberForever($key, $value)](test/exa-rememberForever.php)
- [递增 increment($key, $step)](test/exa-increment.php)
- [递减 decrement($key, $step)](test/exa-decrement.php)
- [删除缓存 forget($key)](test/exa-forget.php)
- [清除所有缓存](test/exa-flush.php)
- [切换引擎 store($engine)](test/exa-store.php)
- [使用外部配置文件](test/exa-config.php)
- [扩展缓存](test/exa-extends.php)
- [注册独立缓存](test/exa-register.php)