<?php

namespace rouda\OpenProvider\Api;

class NameServers extends AbstractApi
{
    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createNs($params)
    {
        return $this->post(['createNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createTemplateDns($params)
    {
        return $this->post(['createTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createZoneDns($params)
    {
        return $this->post(['createZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteNs($params)
    {
        return $this->post(['deleteNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteTemplateDns($params)
    {
        return $this->post(['deleteTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteZoneDns($params)
    {
        return $this->post(['deleteZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyNs($params)
    {
        return $this->post(['modifyNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function modifyZoneDns($params)
    {
        return $this->post(['modifyZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveNs($params)
    {
        return $this->post(['retrieveNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveTemplateDns($params)
    {
        return $this->post(['retrieveTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveZoneDns($params)
    {
        return $this->post(['retrieveZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchNs($params)
    {
        return $this->post(['searchNsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchTemplateDns($params)
    {
        return $this->post(['searchTemplateDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchZoneDns($params)
    {
        return $this->post(['searchZoneDnsRequest' => $params]);
    }

    /**
     * @param $params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function searchZoneRecordDns($params)
    {
        return $this->post(['searchZoneRecordDnsRequest' => $params]);
    }
}
