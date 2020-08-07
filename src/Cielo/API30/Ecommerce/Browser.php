<?php

namespace Cielo\API30\Ecommerce;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class Browser
 *
 * @package Cielo\API30\Ecommerce
*/
class Browser implements \JsonSerializable, CieloSerializable
{
    /** @var string $cookiesAccepted */
    private $cookiesAccepted;

    /** @var string $email */
    private $email;

    /** @var string $hostName */
    private $hostName;

    /** @var string $ipAddress */
    private $ipAddress;

    /** @var string $type */
    private $type;

     /**
     * Browser constructor.
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
        $this->cookiesAccepted   = isset($data->CookiesAccepted) ? $data->CookiesAccepted : null;
        $this->email             = isset($data->Email) ? $data->Email : null;
        $this->hostName          = isset($data->HostName) ? $data->HostName : null;
        $this->ipAddress         = isset($data->IpAddress) ? $data->IpAddress : null;
        $this->type              = isset($data->Type) ? $data->Type : null;
    }

    /**
     * @return mixed
    */
    public function getCookiesAccepted()
    {
        return $this->cookiesAccepted;
    }

    /**
     * @param $cookiesAccepted
     *
     * @return $this
    */
    public function setCookiesAccepted($cookiesAccepted)
    {
        $this->cookiesAccepted = $cookiesAccepted;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     *
     * @return $this
    */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * @param $hostName
     *
     * @return $this
    */
    public function setHostName($hostName)
    {
        $this->hostName = $hostName;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param $ipAddress
     *
     * @return $this
    */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     *
     * @return $this
    */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
