<?php

namespace rouda\OpenProvider;

class OpenProvider
{
    /** @var \Illuminate\Foundation\Application */
    protected $app;

    /** @var array */
    protected $connections = [];

    /** @var \rouda\OpenProvider\Client */
    protected $client;

    /**
     * OpenProvider constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->client, $method], $args);
    }

    /**
     * @param null|string $name
     * @return \rouda\OpenProvider\Client
     */
    public function connection($name = null)
    {
        $name = $name ?: $this->getDefaultConnection();

        return $this->connections[$name] = $this->get($name);
    }

    /**
     * @return string
     */
    public function getDefaultConnection()
    {
        return $this->app['config']['openprovider.default'];
    }

    /**
     * @param string $name
     * @return \rouda\OpenProvider\Client
     */
    protected function get($name)
    {
        return $this->connections[$name] ?? $this->resolve($name);
    }

    /**
     * @param string $name
     * @return \rouda\OpenProvider\Client
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);

        $this->client =  new \rouda\OpenProvider\Client();
        $this->client->setCredentials(
            $config['username'],
            $config['password']
        );
        $this->client->setEnvironment(isset($config['cte']) ? 'cte' : 'live');

        return $this->client;
    }

    /**
     * @param string $name
     * @return array
     */
    protected function getConfig($name)
    {
        return $this->app['config']["openprovider.connections.{$name}"];
    }
}
