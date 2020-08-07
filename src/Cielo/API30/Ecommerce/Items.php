<?php

namespace Cielo\API30\Ecommerce;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class Items
 *
 * @package Cielo\API30\Ecommerce
 */
class Items implements \JsonSerializable, CieloSerializable
{
    /** @var string $giftCategory */
    private $giftCategory;

    /** @var string $hostHedge */
    private $hostHedge;

    /** @var string $nonSensicalHedge */
    private $nonSensicalHedge;

    /** @var string $obscenitiesHedge */
    private $obscenitiesHedge;

    /** @var string $phoneHedge */
    private $phoneHedge;

    /** @var string $name */
    private $name;

    /** @var string $quantity */
    private $quantity;

    /** @var string $sku */
    private $sku;

    /** @var string $unitPrice */
    private $unitPrice;

    /** @var string $risk */
    private $risk;

    /** @var string $timeHedge */
    private $timeHedge;

    /** @var string $type */
    private $type;

    /** @var string $velocityHedge */
    private $velocityHedge;

    /** @var string $passenger */
    private $passenger;

    /**
     * Items constructor.
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
        $this->giftCategory      = isset($data->GiftCategory) ? $data->GiftCategory : null;
        $this->hostHedge         = isset($data->HostHedge) ? $data->HostHedge : null;
        $this->nonSensicalHedge  = isset($data->NonSensicalHedge) ? $data->NonSensicalHedge : null;
        $this->obscenitiesHedge  = isset($data->ObscenitiesHedge) ? $data->ObscenitiesHedge : null;
        $this->phoneHedge        = isset($data->PhoneHedge) ? $data->PhoneHedge : null;
        $this->name              = isset($data->Name) ? $data->Name : null;
        $this->quantity          = isset($data->Quantity) ? $data->Quantity : null;
        $this->sku               = isset($data->Sku) ? $data->Sku : null;
        $this->unitPrice         = isset($data->UnitPrice) ? $data->UnitPrice : null;
        $this->risk              = isset($data->Risk) ? $data->Risk : null;
        $this->timeHedge         = isset($data->TimeHedge) ? $data->TimeHedge : null;
        $this->type              = isset($data->Type) ? $data->Type : null;
        $this->velocityHedge     = isset($data->VelocityHedge) ? $data->VelocityHedge : null;
        
        if (isset($data->Passenger)) {
            $this->passenger = new Passenger();
            $this->passenger->populate($data->Passenger);
        }
    }

    /**
     * @return mixed
    */
    public function getGiftCategory()
    {
        return $this->giftCategory;
    }

    /**
     * @param $giftCategory
     *
     * @return $this
    */
    public function setGiftCategory($giftCategory)
    {
        $this->giftCategory = $giftCategory;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getHostHedge()
    {
        return $this->hostHedge;
    }

    /**
     * @param $hostHedge
     *
     * @return $this
    */
    public function setHostHedge($hostHedge)
    {
        $this->hostHedge = $hostHedge;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getNonSensicalHedge()
    {
        return $this->nonSensicalHedge;
    }

    /**
     * @param $nonSensicalHedge
     *
     * @return $this
    */
    public function setNonSensicalHedge($nonSensicalHedge)
    {
        $this->nonSensicalHedge = $nonSensicalHedge;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getObscenitiesHedge()
    {
        return $this->obscenitiesHedge;
    }

    /**
     * @param $obscenitiesHedge
     *
     * @return $this
    */
    public function setObscenitiesHedge($obscenitiesHedge)
    {
        $this->obscenitiesHedge = $obscenitiesHedge;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getPhoneHedge()
    {
        return $this->phoneHedge;
    }

    /**
     * @param $phoneHedge
     *
     * @return $this
    */
    public function setPhoneHedge($phoneHedge)
    {
        $this->phoneHedge = $phoneHedge;

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
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param $quantity
     *
     * @return $this
    */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param $sku
     *
     * @return $this
    */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param $unitPrice
     *
     * @return $this
    */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getRisk()
    {
        return $this->risk;
    }

    /**
     * @param $risk
     *
     * @return $this
    */
    public function setRisk($risk)
    {
        $this->risk = $risk;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getTimeHedge()
    {
        return $this->timeHedge;
    }

    /**
     * @param $timeHedge
     *
     * @return $this
    */
    public function setTimeHedge($timeHedge)
    {
        $this->timeHedge = $timeHedge;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     *
     * @return $this
    */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getVelocityHedge()
    {
        return $this->velocityHedge;
    }

    /**
     * @param $velocityHedge
     *
     * @return $this
    */
    public function setVelocityHedge($velocityHedge)
    {
        $this->velocityHedge = $velocityHedge;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getPassenger()
    {
        return $this->passenger;
    }

    /**
     * @param $passenger
     *
     * @return $this
    */
    public function setPassenger($passenger)
    {
        $this->passenger = $passenger;

        return $this;
    }
}
