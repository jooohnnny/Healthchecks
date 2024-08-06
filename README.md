# Healthchecks �������

���� [Healthchecks](https://github.com/healthchecks/healthchecks) ʵ�ֵ��������� ping��������أ��� �������Ѿ��������úõĸ��� cron ��ҵ��api ������ء�

## ��װ
### ����Ҫ��
* php 7.4+
* guzzlehttp 7.0.1+

### ��װ��Ҫ�� composer ��
```shell
composer require jooohnnny/healthchecks
```

### ʹ���������Ҫ�������ļ�
```shell
php artisan vendor:publish --provider="Johnny\Healthchecks\HealthchecksProvider"
```

## ʹ��
### Healthchecks �л�ȡ��ǰ���úõ�uuid, �ŵ�ָ��ģ����
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
### �ڶ�Ӧ��ҵ���е��ã�һ���������߼�����ʹ��
```shell
<?php

use Johnny\Healthchecks\Healthchecks;
...

app('healthchecks')->ping('default'); 

����

app(Healthchecks::class)->ping('default')
```