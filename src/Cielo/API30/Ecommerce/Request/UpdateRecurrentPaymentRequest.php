<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\RecurrentPayment;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;

/**
 * Class UpdateRecurrentPaymentRequest
 *
 * @package Cielo\API30\Ecommerce\Request
 */
class UpdateRecurrentPaymentRequest extends AbstractRequest
{

    private $environment;

    private $type;

    private $content;

    /**
     * UpdateRecurrentPaymentRequest constructor.
     *
     * @param             $type
     * @param Merchant    $merchant
     * @param Environment $environment
     */
    public function __construct($type, Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;
        $this->type = $type;
        $this->content = null;
    }

    /**
     * @param $recurrentPaymentId
     *
     * @return null
     * @throws \Cielo\API30\Ecommerce\Request\CieloRequestException
     * @throws \RuntimeException
     */
    public function execute($recurrentPaymentId)
    {
        $url = $this->environment->getApiURL() . '1/RecurrentPayment/' . $recurrentPaymentId . '/' . $this->type;

        return $this->sendRequest('PUT', $url, $this->content);
    }

    /**
     * @param $json
     * @return RecurrentPayment
     */
    protected function unserialize($json)
    {
        return RecurrentPayment::fromJson($json);
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return mixed|null
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this->content;
    }
}