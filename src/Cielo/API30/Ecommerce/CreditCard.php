<?php
namespace Cielo\API30\Ecommerce;

/**
 * Class CreditCard
 *
 * @package Cielo\API30\Ecommerce
 */
class CreditCard implements \JsonSerializable
{

    private $cardNumber;

    private $holder;

    private $expirationDate;

    private $securityCode;

    private $saveCard = false;

    private $brand;

    private $cardToken;

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->cardNumber = isset($data->CardNumber)? $data->CardNumber: null;
        $this->holder = isset($data->Holder)? $data->Holder: null;
        $this->expirationDate = isset($data->ExpirationDate)? $data->ExpirationDate: null;
        $this->securityCode = isset($data->SecurityCode)? $data->SecurityCode: null;
        $this->saveCard = isset($data->SaveCard)? !!$data->SaveCard: false;
        $this->brand = isset($data->Brand)? $data->Brand: null;
        $this->cardToken = isset($data->CardToken)? $data->CardToken: null;
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
}
