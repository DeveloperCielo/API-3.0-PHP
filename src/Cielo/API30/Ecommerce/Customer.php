<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class Customer
 *
 * @package Cielo\API30\Ecommerce
 */
class Customer implements \JsonSerializable
{

    /** @var string|null 
     * Nome do Comprador.
     * Tamanho: 255
     * */
    private $name;

    /** @var string|null 
     * Status de cadastro do comprador na loja, valores possíveis: 
     * NEW
     * EXISTING
     * * Tamanho: 255
     */
    private $status;

    /** @var string|null 
     * Email do Comprador.
     * * Tamanho: 255
     */
    private $email;

    /** @var date|null 
     * Data de nascimento do Comprador.
     * * Tamanho: 10
     */
    private $birthDate;

    /** @var string|null 
     * Número do RG, CPF ou CNPJ do Cliente.
     * * Tamanho: 14
     */
    private $identity;

    /** @var string|null 
     * Tipo de documento de identificação do comprador, valores possíveis: 
     * CFP
     * CNPJ
     * * Tamanho: 255
     * */
    private $identityType;

    /** @var Address|null 
     * Endereço do Comprador
     */
    private $address;

    /** @var Address|null 
     * Endereço de entrega do Comprador para produtos físicos
     */
    private $deliveryAddress;

    /** @var string|null 
     * Número de telefone fixo do comprador
     * * Tamanho: 
     */
    private $phone;

    /** @var string|null 
     * Número de telefone celular do comprador
     * * Tamanho: 
     */
    private $mobile;

    /**
     * Customer constructor.
     *
     * @param null $name
     */
    public function __construct($name = null)
    {
        $this->setName($name);
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
        $this->name      = isset($data->Name) ? $data->Name : null;
        $this->status      = isset($data->Status) ? $data->Status : null;
        $this->email     = isset($data->Email) ? $data->Email : null;
        $this->birthDate = isset($data->Birthdate) ? $data->Birthdate : null;

        $this->identity     = isset($data->Identity) ? $data->Identity : null;
        $this->identityType = isset($data->IdentityType) ? $data->IdentityType : null;

        if (isset($data->Address)) {
            $this->address = new Address();
            $this->address->populate($data->Address);
        }

        if (isset($data->DeliveryAddress)) {
            $this->deliveryAddress = new Address();
            $this->deliveryAddress->populate($data->DeliveryAddress);
        }

        $this->phone      = isset($data->Phone) ? $data->Phone : null;
        $this->mobile      = isset($data->Mobile) ? $data->Mobile : null;
    }

    /**
     * @return Address
     */
    public function address()
    {
        $address = new Address();

        $this->setAddress($address);

        return $address;
    }

    /**
     * @return Address
     */
    public function deliveryAddress()
    {
        $address = new Address();

        $this->setDeliveryAddress($address);

        return $address;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param $birthDate
     *
     * @return $this
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param $identity
     *
     * @return $this
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentityType()
    {
        return $this->identityType;
    }

    /**
     * @param $identityType
     *
     * @return $this
     */
    public function setIdentityType($identityType)
    {
        $this->identityType = $identityType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param $deliveryAddress
     *
     * @return $this
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

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

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param $mobile
     *
     * @return $this
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }
}
