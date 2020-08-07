<?php

namespace Cielo\API30\Ecommerce;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class MerchantDefinedFields
 *
 * @package Cielo\API30\Ecommerce
 */
class MerchantDefinedFields implements \JsonSerializable, CieloSerializable
{
    /** @var string $id */
    private $id;

    /** @var string $value */
    private $value;

    /**
     * MerchantDefinedFields constructor.
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
        $this->id     = isset($data->Id) ? $data->Id : null;
        $this->value  = isset($data->Value) ? $data->Value : null;
    }

    /**
     * @return mixed
    */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return $this
    */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     *
     * @return $this
    */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
