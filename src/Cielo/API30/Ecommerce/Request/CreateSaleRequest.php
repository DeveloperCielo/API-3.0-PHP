<?php
namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\Request\AbstractSaleRequest;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Sale;

class CreateSaleRequest extends AbstractSaleRequest
{

    private $environment;

    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);
        
        $this->environment = $environment;
    }

    public function execute($sale)
    {
        $url = $this->environment->getApiUrl() . '1/sales/';

        return $this->sendRequest('POST', $url, $sale);
    }

    protected function unserialize($json)
    {
        return Sale::fromJson($json);
    }
}