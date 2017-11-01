<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Environment;
use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\RecurrentPayment;

/**
 * Class QueryRecurrentPaymentRequest
 *
 * @package Cielo\API30\Ecommerce\Request
 */
class QueryRecurrentPaymentRequest extends AbstractSaleRequest
{
    private $environment;

    /**
     * QueryRecurrentPaymentRequest constructor.
     *
     * @param Merchant $merchant
     * @param Environment $environment
     */
    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;
    }

    /**
     * @param $recurrentPaymentId
     *
     * @return mixed
     *
     * @throws \RuntimeException
     * @throws \Cielo\API30\Ecommerce\Request\CieloRequestException
     */
    public function execute($recurrentPaymentId)
    {
        $url = $this->environment->getApiQueryURL() . '1/RecurrentPayment/' . $recurrentPaymentId;

        return $this->sendRequest('GET', $url);
    }

    /**
     * @param $json
     *
     * @return RecurrentPayment
     */
    protected function unserialize($json)
    {
        return RecurrentPayment::fromJson($json);
    }
}
