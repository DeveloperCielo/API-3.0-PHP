<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class Environment
 *
 * @package Cielo\API30\Ecommerce
 */
class Environment implements \Cielo\API30\Environment
{
    private $api;
    private $apiQuery;

    /**
     * Environment constructor.
     *
     * @param $api
     * @param $apiQuery
     */
    private function __construct($api, $apiQuery)
    {
        $this->api = $api;
        $this->apiQuery = $apiQuery;
    }

    /**
     * @return Environment
     */
    public static function sandbox()
    {
        $api = 'https://apisandbox.cieloecommerce.cielo.com.br/';
        $apiQuery = 'https://apiquerysandbox.cieloecommerce.cielo.com.br/';

        return new self($api, $apiQuery);
    }

    /**
     * @return Environment
     */
    public static function production()
    {
        $api = 'https://api.cieloecommerce.cielo.com.br/';
        $apiQuery = 'https://apiquery.cieloecommerce.cielo.com.br/';

        return new self($api, $apiQuery);
    }

    /**
     * Gets the environment's Api URL
     *
     * @return string the Api URL
     */
    public function getApiUrl()
    {
        return $this->api;
    }

    /**
     * Gets the environment's Api Query URL
     *
     * @return string Api Query URL
     */
    public function getApiQueryURL()
    {
        return $this->apiQuery;
    }
}
