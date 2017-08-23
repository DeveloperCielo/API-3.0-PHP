<?php
namespace Cielo\API30\Ecommerce;

class Travel implements \JsonSerializable
{
    
    private $departureTime;

    private $journeyType;
    
    private $route;
    
    private $legs = array();
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->departureTime = isset($data->DepartureTime) ? $data->DepartureTime : null;
        $this->journeyType = isset($data->JourneyType) ? $data->JourneyType : null;
        $this->route = isset($data->Route) ? $data->Route : null;       
        $this->legs = isset($data->RouLegste) ? $data->Legs : null;
    }
    
    public static function fromJson($json)
    {
        $travel = new Travel();
        $travel->populate(json_decode($json));

        return $travel;
    }

    public function getDepartureTime() 
    {
        return $this->departureTime;
    }

    public function getJourneyType()
    {
        return $this->journeyType;
    }

    public function getRoute() 
    {
        return $this->route;
    }

    public function getLegs() 
    {
        return $this->legs;
    }

    public function setDepartureTime($departureTime) 
    {
        $this->departureTime = $departureTime;
        return $this;
    }

    public function setJourneyType($journeyType) 
    {
        $this->journeyType = $journeyType;
        return $this;
    }

    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    public function setLegs(array $legs) 
    {
        $this->legs = $legs;
        return $this;
    }

}