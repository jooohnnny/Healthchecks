<?php

declare(strict_types=1);

namespace Trigold\Udesk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool ping() healthchecks 监控检查主动 ping
 */
class Healthchecks extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'healthchecks';
    }
}
