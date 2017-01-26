<?php
namespace Cielo\API30\Ecommerce;

class Travel implements \JsonSerializable
{
    private $DepartureTime; //String

    private $JourneyType; //String

    private $Route; //String

    private $Legs; //array(Leg)

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $travel = new Travel();
        $travel->populate(json_decode($json));

        return $travel;
    }

    public function populate(\stdClass $data)
    {
        $reflect = new \ReflectionClass($data);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        foreach ($props as $prop) {
            try {
                if ($prop->getName() == "Legs") {
                    $this->{$prop->getName()} = [] ;
                    $temp = $data->{$prop->getName()};
                    foreach ($temp as $row) {
                        $this->{$prop->getName()}[] = (new Legs())->populate($row);
                    }
                } else {
                    $this->{$prop->getName()} = $data->{$prop->getName()};
                }
            } catch (\Exception $e) {
            }
        }
    }

    public function getDepartureTime()
    {
         return $this->DepartureTime ;
    }
    public function setDepartureTime($DepartureTime)
    {
         $this->DepartureTime = $DepartureTime;
        return $this;
    }

    public function getJourneyType()
    {
         return $this->JourneyType ;
    }
    public function setJourneyType($JourneyType)
    {
         $this->JourneyType = $JourneyType;
        return $this;
    }

    public function getRoute()
    {
         return $this->Route ;
    }
    public function setRoute($Route)
    {
         $this->Route = $Route;
        return $this;
    }

    public function getLegs()
    {
         return $this->Legs ;
    }
    public function setLegs($Legs)
    {
         $this->Legs = $Legs;
        return $this;
    }
}
