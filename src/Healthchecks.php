<?php

declare(strict_types=1);

namespace Jooohnnny\Healthchecks;

use GuzzleHttp\Client;

class Healthchecks
{
    protected $baseUrl;
    protected $modules;
    protected $client;

    /**
     * @param $get
     */
    public function __construct(array $config)
    {
        if (! isset($config['base_url']) || is_null($config['base_url'])) {
            throw new \RuntimeException("config 'healthchecks.base_url' is undefined");
        }

        if (! isset($config['modules']) || is_null($config['modules'])) {
            throw new \RuntimeException("config 'healthchecks.modules' is undefined");
        }

        $this->baseUrl = $config['base_url'];
        $this->modules = $config['modules'];
        $this->client  = new Client();
    }

    /**
     * @param $module
     *
     * @return bool
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function ping($module = 'default'): bool
    {
        if (! isset($this->modules[$module]) || is_null($this->modules[$module])) {
            throw new \RuntimeException("config 'healthchecks.modules.{$module}' is undefined");
        }

        $module = $this->modules[$module];
        if (! isset($module['uuid']) || is_null($module['uuid'])) {
            throw new \RuntimeException("config 'healthchecks.modules.{$module}.uuid' is undefined");
        }

        try {
            $response = $this->client->request('GET', sprintf('%s/%s', $this->baseUrl, $module['uuid']));
            return $response->getStatusCode() == 200;
        } catch (\Exception $e) {
            throw new \RuntimeException(sprintf('healthcheck ping catch %s %s %s %s', $e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()));
        }
    }
}
