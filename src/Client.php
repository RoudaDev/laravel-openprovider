<?php

namespace rouda\OpenProvider;

use rouda\OpenProvider\HttpClient\HttpClient;

class Client
{
    /**
     * @var array
     */
    protected $classes = [
        'customers' => 'Customers',
        'domains' => 'Domains',
        'emails' => 'Emails',
        'emailstemplates' => 'EmailsTemplates',
        'extensions' => 'Extensions',
        'financials' => 'Financials',
        'licenses' => 'Licenses',
        'nameservers' => 'NameServers',
        'nameserversgroups' => 'NameServersGroups',
        'resellers' => 'Resellers',
        'spamexperts' => 'SpamExperts',
        'ssl' => 'Ssl',
        'tags' => 'Tags',
    ];

    /**
     * @var array
     */
    protected $endpoints = [
        'live' => 'https://api.openprovider.eu',
        'cte' => 'http://api.sandbox.openprovider.nl:8480/v1beta/'
    ];

    /**
     * @var
     */
    protected $environment;

    /**
     * @var
     */
    protected $httpClient;

    /**
     * @param $method
     * @param $args
     * @return Api\Customers|Api\Domains|Api\Emails|Api\EmailsTemplates|Api\Extensions|Api\Financials|Api\Licenses
     */
    public function __call($method, $args)
    {
        try {
            return $this->api($method);
        } catch (InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method called:"%s"', $method));
        }
    }

    /**
     * @param $name
     * @return Api\Customers|Api\Domains|Api\Emails|Api\EmailsTemplates|Api\Extensions|Api\Financials|Api\Licenses
     */
    public function api($name)
    {
        if (!isset($this->classes[$name])) {
            throw new \InvalidArgumentException(sprintf('Undefined method called:"%s"', $name));
        }

        $class = '\\rouda\\OpenProvider\\Api\\' . $this->classes[$name];

        return new $class($this);
    }

    /**
     * @param $username
     * @param $password
     */
    public function setCredentials($username, $password)
    {
        $this->getHttpClient()->setOptions([
            'username' => $username,
            'password' => $password
        ]);
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!isset($this->httpClient)) {
            $this->httpClient = new HttpClient();
            $this->httpClient->setOptions([
                'base_url' => $this->getEndpointUrl()
            ]);
        }

        $this->httpClient->setOptions([
            'base_url' => $this->getEndpointUrl()
        ]);

        return $this->httpClient;
    }

    /**
     * @return mixed
     */
    public function getEndpointUrl()
    {
        return $this->endpoints[($this->getEnvironment() == 'cte') ? 'cte' : 'live'];
    }

    /**
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }
}
