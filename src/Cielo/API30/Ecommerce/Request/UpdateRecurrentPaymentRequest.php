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

    private $param;

    public function __construct($type, Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;

        $this->type = $type;

        $this->param = null;
    }

    public function execute($recurrentPaymentId)
    {
        $url = $this->environment->getApiQueryURL() . '1/RecurrentPayment/' . $recurrentPaymentId . '/' . $this->type;

        return $this->sendRequest('PUT', $url, $this->param);
    }

    public function getParam() {
        return $this->param;
    }

    public function setParam( $param ) {
        $this->param = $param;
    }

    protected function unserialize($json)
    {
        return RecurrentPayment::fromJson($json);
    }
}
