<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\RecurrentPayment;
use Cielo\API30\Environment;
use Cielo\API30\Merchant;

/**
 * Class CieloBinRequest
 *
 * @package Cielo\API30\Ecommerce\Request
 */
class CieloBinRequest extends AbstractRequest
{

    private $environment;    

    private $content;

    /**
     * UpdateRecurrentPaymentRequest constructor.
     *
     * @param             $type
     * @param Merchant    $merchant
     * @param Environment $environment
     */
    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;        
        $this->content = null;
    }

    /**
     * @param $cardBin
     *
     * @return null
     * @throws \Cielo\API30\Ecommerce\Request\CieloRequestException
     * @throws \RuntimeException
     */
    public function execute($cardBin)
    {        
        $url = $this->environment->getApiQueryURL() . '1/cardBin/' . $cardBin ;

        return $this->sendRequest('GET', $url, $this->content);
    }

    /**
     * @param $json
     * @return json 
     */
    protected function unserialize($json)
    {        
        return json_decode($json);
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
