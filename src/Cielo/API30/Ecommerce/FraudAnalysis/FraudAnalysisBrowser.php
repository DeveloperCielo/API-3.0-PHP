<?php

namespace Cielo\API30\Ecommerce\FraudAnalysis;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class FraudAnalysisBrowser
 *
 * @package Cielo\API30\Ecommerce\FraudAnalysis
 */
class FraudAnalysisBrowser implements CieloSerializable
{
    /** @var boolean Booleano para identificar se o browser do cliente aceita cookies. */
    private $cookiesAccepted;

    /** @var string|null E-mail registrado no browser do comprador. */
    private $email;

    /** @var string|null Nome do host onde o comprador estava antes de entrar no site da loja. */
    private $hostName;

    /** @var string Endereço IP do comprador. É altamente recomendável o envio deste campo. */
    private $ipAddress;

    /** @var string|null Nome do browser utilizado pelo comprador. */
    private $type;

    /** @var string|null */
    private $browserFingerprint;

    /**
     * FraudAnalysisBrowser constructor.
     *
     */
    public function __construct($ipAddress=null,
                                $cookiesAccepted = true,
                                $email=null,
                                $hostName=null,
                                $type=null,
                                $browserFingerprint=null)
    {
        $this->cookiesAccepted = $cookiesAccepted;
        $this->email = $email;
        $this->hostName = $hostName;
        $this->ipAddress = $ipAddress;
        $this->type = $type;
        $this->browserFingerprint = $browserFingerprint;
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
        $this->cookiesAccepted = isset($data->CookiesAccepted) ? $data->CookiesAccepted : null;
        $this->email = isset($data->Email) ? $data->Email : null;
        $this->hostName = isset($data->HostName) ? $data->HostName : null;
        $this->ipAddress = isset($data->IpAddress) ? $data->IpAddress : null;
        $this->type = isset($data->Type) ? $data->Type : null;
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

    /**
     * @return mixed
     */
    public function getBrowserFingerprint()
    {
        return $this->browserFingerprint;
    }

    /**
     * @param $browserFingerprint
     *
     * @return $this
     */
    public function setBrowserFingerprint($browserFingerprint)
    {
        $this->browserFingerprint = $browserFingerprint;

        return $this;
    }

    
}
