<?php

declare(strict_types=1);

namespace Jooohnnny\Healthchecks;

use Illuminate\Contracts\Container\Container;

class Manager
{
    protected $config;
    protected $driver;

    public function __construct(Container $container)
    {
        $this->config = $container->make('config');
    }

    /**
     * @param $get
     */
    private function driver()
    {
        $config = $this->config->get('healthchecks');
        if (is_null($config)) {
            throw new \RuntimeException("config 'healthchecks' is undefined");
        }

        $this->driver = new Healthchecks($config);
    }

    /**
     * Constructs a new plugin object with an associative array of default driver.
     */
    public function __call($method, $args)
    {
        if (is_null($this->driver)) {
            $this->driver();
        }

        if (method_exists($this->driver, $method)) {
            return tap($this->driver->$method(...$args), function ($result) {
            });
        }

        throw new \InvalidArgumentException("Method [{$method}] is not supported.");
    }
}
