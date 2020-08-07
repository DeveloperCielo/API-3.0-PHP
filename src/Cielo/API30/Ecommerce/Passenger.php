<?php

namespace Cielo\API30\Ecommerce;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class Passenger
 *
 * @package Cielo\API30\Ecommerce
 */
class Passenger implements \JsonSerializable, CieloSerializable
{
    /** @var string $email */
    private $email;

    /** @var string $identity */
    private $identity;

    /** @var string $name */
    private $name;

    /** @var string $rating */
    private $rating;

    /** @var string $phone */
    private $phone;

    /** @var string $status */
    private $status;

    /**
     * Passenger constructor.
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
        $this->email        = isset($data->Email) ? $data->Email : null;
        $this->identity     = isset($data->Identity) ? $data->Identity : null;
        $this->name         = isset($data->Name) ? $data->Name : null;
        $this->rating       = isset($data->Rating) ? $data->Rating : null;
        $this->phone        = isset($data->Phone) ? $data->Phone : null;
        $this->status       = isset($data->Status) ? $data->Status : null;
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
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param $rating
     *
     * @return $this
    */
    public function setRating($rating)
    {
        $this->rating = $rating;

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
}
