# Healthchecks 健康检查

基于 [Healthchecks](https://github.com/healthchecks/healthchecks) 实现的自主调动 ping（心跳监控）， 来监听已经事先设置好的各种 cron 作业、api 健康监控。

## 安装
### 环境要求
* php 7.4+
* guzzlehttp 7.0.1+

### 安装需要的 composer 包
```shell
composer require jooohnnny/healthchecks
```

### 使用命令复制需要的配置文件
```shell
php artisan vendor:publish --provider="Johnny\Healthchecks\HealthchecksProvider"
```

## 使用
### Healthchecks 中获取提前设置好的uuid, 放到指定模块中
```shell
<?php

declare(strict_types=1);

return [
    'base_url' => env('HEALTHCHECKS_BASE_URL', 'https://hc-ping.com'),
    'modules'  => [
        'default' => [
            'uuid' => env('HEALTHCHECKS_DEFAULT_UUID', ''),
        ],
    ],
];

```
### 在对应的业务中调用，一般在所有逻辑走完使用
```shell
<?php

use Johnny\Healthchecks\Healthchecks;
...

app('healthchecks')->ping('default'); 

或者

app(Healthchecks::class)->ping('default')
```