<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\CreditCard;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Merchant;
use Psr\Log\LoggerInterface;

/**
 * Class CreateCardTokenRequestHandler
 *
 * @package AppBundle\Handler\Cielo
 */
class TokenizeCardRequest extends AbstractRequest
{

    private $environment;
    /** @var Merchant $merchant */
    private $merchant;

	/**
	 * CreateCardTokenRequestHandler constructor.
	 *
	 * @param Merchant $merchant
	 * @param Environment $environment
	 * @param LoggerInterface|null $logger
	 */
    public function __construct(Merchant $merchant, Environment $environment, LoggerInterface $logger = null)
    {
        parent::__construct($merchant, $logger);

        $this->merchant    = $merchant;
        $this->environment = $environment;
    }

    /**
     * @inheritdoc
     */
    public function execute($param)
    {
        $url = $this->environment->getApiUrl() . '1/card/';

        return $this->sendRequest('POST', $url, $param);
    }

    /**
     * @inheritdoc
     */
    protected function unserialize($json)
    {
        return CreditCard::fromJson($json);
    }
}
