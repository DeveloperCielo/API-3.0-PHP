<?php
namespace Cielo\API30\Ecommerce;

class MerchantDefinedField implements \JsonSerializable
{

    private $Id; //int

    private $Value; //String

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $merchantDefinedField = new MerchantDefinedField();
        $merchantDefinedField->populate(json_decode($json));

        return $merchantDefinedField;
    }

    public function populate(\stdClass $data)
    {
        $reflect = new \ReflectionObject($data);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        foreach ($props as $prop) {
            try {
                $this->{$prop->getName()} = $data->{$prop->getName()};
            } catch (\Exception $e) {
            }
        }
        return $this;
    }

    public function getId()
    {
        return $this->Id ;
    }
    public function setId($Id)
    {
         $this->Id = $Id;
        return $this;
    }

    public function getValue()
    {
         return $this->Value ;
    }
    public function setValue($Value)
    {
         $this->Value = $Value;
        return $this;
    }
}
