<?php
namespace Cielo\API30\Ecommerce;

class Passenger implements \JsonSerializable
{

    private $Email; //String

    private $Identity; //String

    private $Name; //String

    private $Rating; //String

    private $Phone; //String

    private $Status; //String

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $passenger = new Passenger();
        $passenger->populate(json_decode($json));

        return $passenger;
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

    public function getEmail()
    {
         return $this->Email;
    }
    public function setEmail($Email)
    {
         $this->Email = $Email;
        return $this;
    }

    public function getIdentity()
    {
         return $this->Identity;
    }
    public function setIdentity($Identity)
    {
         $this->Identity = $Identity;
        return $this;
    }

    public function getName()
    {
         return $this->Name;
    }
    public function setName($Name)
    {
         $this->Name = $Name;
        return $this;
    }

    public function getRating()
    {
         return $this->Rating;
    }
    public function setRating($Rating)
    {
         $this->Rating = $Rating;
        return $this;
    }

    public function getPhone()
    {
         return $this->Phone;
    }
    public function setPhone($Phone)
    {
         $this->Phone = $Phone;
        return $this;
    }

    public function getStatus()
    {
         return $this->Status;
    }
    public function setStatus($Status)
    {
         $this->Status = $Status;
        return $this;
    }
}
