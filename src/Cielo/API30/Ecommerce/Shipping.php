<?php

namespace Cielo\API30\Ecommerce;
use Cielo\API30\Ecommerce\CieloSerializable;
/**
 * Class Shipping
 *
 * @package Cielo\API30\Ecommerce
 */
class Shipping implements \JsonSerializable, CieloSerializable
{
    /** @var string $addressee */
    private $addressee;

    /** @var string $method */
    private $method;

    /** @var string $phone */
    private $phone;

    /**
     * Shipping constructor.
     *
     * @param null
    */
    public function __construct()
    {
    }

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
        $this->addressee  = isset($data->Addressee) ? $data->Addressee : null;
        $this->method     = isset($data->Method) ? $data->Method : null;
        $this->phone      = isset($data->Phone) ? $data->Phone : null;
    }

    /**
     * @return mixed
    */
    public function getAddressee()
    {
        return $this->addressee;
    }

    /**
     * @param $addressee
     *
     * @return $this
    */
    public function setAddressee($addressee)
    {
        $this->addressee = $addressee;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     *
     * @return $this
    */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     *
     * @return $this
    */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}
