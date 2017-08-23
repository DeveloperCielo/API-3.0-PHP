<?php
namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\Request\AbstractRequest;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Payment;

class UpdateSaleRequest extends AbstractRequest
{

    private $environment;

    private $type;

    private $serviceTaxAmount;

    private $amount;

    public function __construct($type, Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);
        
        $this->environment = $environment;
        $this->type = $type;
    }

    public function execute($paymentId)
    {
        $url = $this->environment->getApiUrl() . '1/sales/' . $paymentId . '/' . $this->type;
        $params = [];
        
        if ($this->amount != null) {
            $params['amount'] = $this->amount;
        }
        
        if ($this->serviceTaxAmount != null) {
            $params['serviceTaxAmount'] = $this->serviceTaxAmount;
        }
        
        $url .= '?' . http_build_query($params);
        
        return $this->sendRequest('PUT', $url);
    }

    protected function unserialize($json)
    {
        return Payment::fromJson($json);
    }

    public function getServiceTaxAmount()
    {
        return $this->serviceTaxAmount;
    }

    public function setServiceTaxAmount($serviceTaxAmount)
    {
        $this->serviceTaxAmount = $serviceTaxAmount;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }
}