<?php
namespace Cielo\API30\Ecommerce;

class Shipping implements \JsonSerializable
{
    private $Addressee; //String

    private $Method; //String

    private $Phone; //String

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $shipping = new Shipping();
        $shipping->populate(json_decode($json));

        return $shipping;
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

    public function getAddressee()
    {
         return $this->Addressee ;
    }
    public function setAddressee($Addressee)
    {
         $this->Addressee = $Addressee;
        return $this;
    }

    public function getMethod()
    {
         return $this->Method ;
    }
    public function setMethod($Method)
    {
         $this->Method = $Method;
        return $this;
    }

    public function getPhone()
    {
         return $this->Phone ;
    }
    public function setPhone($Phone)
    {
         $this->Phone = $Phone;
        return $this;
    }
}
