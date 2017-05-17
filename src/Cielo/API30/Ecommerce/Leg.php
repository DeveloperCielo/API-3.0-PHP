<?php
namespace Cielo\API30\Ecommerce;

class Leg implements \JsonSerializable
{

    private $Destination; //String

    private $Origin; //String

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $leg = new Leg();
        $leg->populate(json_decode($json));

        return $leg;
    }

    public function populate(\stdClass $data)
    {
        $reflect = new \ReflectionClass($data);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        foreach ($props as $prop) {
            try {
                $this->{$prop->getName()} = $data->{$prop->getName()};
            } catch (\Exception $e) {
            }
        }
    }


    public function getDestination()
    {
        return $this->Destination ;
    }
    public function setDestination($Destination)
    {
         $this->Destination = $Destination;
        return $this;
    }

    public function getOrigin()
    {
         return $this->Origin ;
    }
    public function setOrigin($Origin)
    {
         $this->Origin = $Origin;
        return $this;
    }
}
