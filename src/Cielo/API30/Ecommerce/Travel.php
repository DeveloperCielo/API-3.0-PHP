<?php

namespace Cielo\API30\Ecommerce;

use Cielo\API30\Ecommerce\CieloSerializable;
use Cielo\API30\Ecommerce\Legs;

/**
 * Class Travel
 *
 * @package Cielo\API30\Ecommerce
 */
class Travel implements \JsonSerializable, CieloSerializable
{
    /** @var string $departureTime */
    private $departureTime;

    /** @var string $journeyType */
    private $journeyType;

    /** @var string $route */
    private $route;

    /** @var string $legs */
    private $legs;

    /**
     * Travel constructor.
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
        $this->departureTime  = isset($data->DepartureTime) ? $data->DepartureTime : null;
        $this->journeyType    = isset($data->JourneyType) ? $data->JourneyType : null;
        $this->route          = isset($data->Route) ? $data->Route : null;

        if (isset($data->Legs)) {
            foreach($data->Legs as $leg){
                $legsInstance = new Legs();
                $legsInstance->populate($leg);

                $this->legs [] = $legsInstance;
            }
        }
    }

    /**
     * @return mixed
    */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @param $departureTime
     *
     * @return $this
    */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getJourneyType()
    {
        return $this->journeyType;
    }

    /**
     * @param $journeyType
     *
     * @return $this
    */
    public function setJourneyType($journeyType)
    {
        $this->journeyType = $journeyType;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param $route
     *
     * @return $this
    */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getLegs()
    {
        return $this->legs;
    }

    /**
     * @param $legs
     *
     * @return $this
    */
    public function setLegs($legs)
    {
        $this->legs = $legs;

        return $this;
    }
}
