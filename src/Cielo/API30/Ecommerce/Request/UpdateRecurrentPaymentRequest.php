<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\Request\AbstractRequest;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\RecurrentPayment;

class UpdateRecurrentPaymentRequest extends AbstractRequest
{

    private $environment;

    private $type;

    private $content;

    public function __construct($type, Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;
        $this->type = $type;
        $this->content = null;
    }

    public function execute($recurrentPaymentId)
    {
        $url = $this->environment->getApiURL() . '1/RecurrentPayment/' . $recurrentPaymentId . '/' . $this->type;

        return $this->sendRequest('PUT', $url, $this->content);
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

    /**
     * @param $json
     * @return RecurrentPayment
     */
    protected function unserialize($json)
    {
        return RecurrentPayment::fromJson($json);
    }

}