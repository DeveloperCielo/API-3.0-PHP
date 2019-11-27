<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class CreditCard
 *
 * @package Cielo\API30\Ecommerce
 */
class CreditCard implements \JsonSerializable, CieloSerializable
{
    /**
     * Bandeira Visa
     */
    const VISA = 'Visa';

    /**
     * Bandeira Mastercard
     */
    const MASTERCARD = 'Master';

    /**
     * Bandeira American Express
     */
    const AMEX = 'Amex';

    /**
     * Bandeira ELO
     */
    const ELO = 'Elo';

    /**
     * Bandeira Aura
     */
    const AURA = 'Aura';

    /**
     * Bandeira JCB
     */
    const JCB = 'JCB';

    /**
     * Bandeira Diners
     */
    const DINERS = 'Diners';

    /**
     * Bandeira Discover
     */
    const DISCOVER = 'Discover';

    /**
     * Bandeira Hipercard
     */
    const HIPERCARD = 'Hipercard';

    /** @var string
     * Número do Cartão do Comprador
     * Tamanho: 19
     */
    private $cardNumber;

    /** @var string|null
     * Nome do Comprador impresso no cartão
     * Tamanho: 25
     */
    private $holder;

    /** @var string
     * Data de validade impresso no cartão
     * Tamanho: 7
     */
    private $expirationDate;

    /** @var string|null
     * Código de segurança impresso no verso do cartão
     * Tamanho: 4
     */
    private $securityCode;

    /** @var bool
     * O cartão deve ser salvo para o cliente?
     */
    private $saveCard = false;

    /** @var string
     * Bandeira do cartão. Valores possíveis:
     * Visa
     * Master
     * Amex
     * Elo
     * Aura
     * JCB
     * Diners
     * Discover
     * Hipercard
     * Tamanho: 10
     */
    private $brand;

    /** @var string $cardToken */
    private $cardToken;

    /** @var string $customerName */
    private $customerName;

    /** @var \stdClass $links */
    private $links;

    /** @var CardOnFile|null $cardOnFile */
    private $cardOnFile;

    /**
     * @param string $json
     *
     * @return CreditCard
     */
    public static function fromJson($json)
    {
        $object    = \json_decode($json);
        $cardToken = new CreditCard();
        $cardToken->populate($object);

        return $cardToken;
    }

    /**
     * @inheritdoc
     */
    public function populate(\stdClass $data)
    {
        $this->cardNumber     = isset($data->CardNumber) ? $data->CardNumber : null;
        $this->holder         = isset($data->Holder) ? $data->Holder : null;
        $this->expirationDate = isset($data->ExpirationDate) ? $data->ExpirationDate : null;
        $this->securityCode   = isset($data->SecurityCode) ? $data->SecurityCode : null;
        $this->saveCard       = isset($data->SaveCard) ? !!$data->SaveCard : false;
        $this->brand          = isset($data->Brand) ? $data->Brand : null;
        $this->cardToken      = isset($data->CardToken) ? $data->CardToken : null;
        $this->links          = isset($data->Links) ? $data->Links : new \stdClass();
        $this->customerName   = isset($data->CustomerName) ? $data->CustomerName : null;

        if (isset($data->cardOnFile)) {
            $this->cardOnFile = new CardOnFile();
            $this->cardOnFile->populate($data->cardOnFile);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param $cardNumber
     *
     * @return $this
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * @param $holder
     *
     * @return $this
     */
    public function setHolder($holder)
    {
        $this->holder = $holder;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param $expirationDate
     *
     * @return $this
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * @param $securityCode
     *
     * @return $this
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;

        return $this;
    }

    /**
     * @return bool
     */
    public function getSaveCard()
    {
        return $this->saveCard;
    }

    /**
     * @param $saveCard
     *
     * @return $this
     */
    public function setSaveCard($saveCard)
    {
        $this->saveCard = $saveCard;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param $brand
     *
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardToken()
    {
        return $this->cardToken;
    }

    /**
     * @param $cardToken
     *
     * @return $this
     */
    public function setCardToken($cardToken)
    {
        $this->cardToken = $cardToken;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param string $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return \stdClass
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param \stdClass $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * @return CardOnFile
     */
    public function getCardOnFile()
    {
        return $this->cardOnFile;
    }

    /**
     * @param CardOnFile $cardOnFile
     */
    public function setCardOnFile($cardOnFile)
    {
        $this->cardOnFile = $cardOnFile;
    }

}
