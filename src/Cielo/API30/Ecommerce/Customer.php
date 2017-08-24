<?php
namespace Cielo\API30\Ecommerce;

/**
 * Class Customer
 *
 * @package Cielo\API30\Ecommerce
 */
class Customer implements \JsonSerializable
{

    private $name;

    private $email;

    private $birthDate;

    private $identity;

    private $identityType;

    private $address;

    private $deliveryAddress;

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
        $this->name = isset($data->Name) ? $data->Name : null;
        $this->email = isset($data->Email) ? $data->Email : null;
        $this->birthDate = isset($data->Birthdate) ? $data->Birthdate : null;

        $this->identity = isset($data->Identity) ? $data->Identity : null;
        $this->identityType = isset($data->IdentityType) ? $data->IdentityType : null;

        if (isset($data->Address)) {
            $this->address = new Address();
            $this->address->populate($data->Address);
        }

        if (isset($data->DeliveryAddress)) {
            $this->deliveryAddress = new Address();
            $this->deliveryAddress->populate($data->DeliveryAddress);
        }
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
}
