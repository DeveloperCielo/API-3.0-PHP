<?php
namespace Cielo\API30\Ecommerce;

class Items implements \JsonSerializable
{
    
    const YES = 'Yes';
    
    const NO = 'No';
    
    const OFF = 'Off';
    
    const LOW = 'Low';
    
    const NORMAL = 'Normal';
    
    const HIGH = 'High';
    
    private $giftCategory;

    private $hostHedge;
    
    private $nonSensicalHedge;
    
    private $obscenitiesHedge;
    
    private $phoneHedge;
    
    private $name;
    
    private $quantity;
    
    private $sku;
    
    private $unitPrice;
    
    private $risk;
    
    private $timeHedge;
    
    private $type;
    
    private $velocityHedge;
    
    private $passenger;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->giftCategory = isset($data->GiftCategory) ? $data->GiftCategory : null;
        $this->hostHedge = isset($data->HostHedge) ? $data->HostHedge : null;
        $this->nonSensicalHedge = isset($data->NonSensicalHedge) ? $data->NonSensicalHedge : null;
        $this->obscenitiesHedge = isset($data->ObscenitiesHedge) ? $data->ObscenitiesHedge : null;
        $this->phoneHedge = isset($data->PhoneHedge) ? $data->PhoneHedge : null;
        $this->name = isset($data->Name) ? $data->Name : null;
        $this->quantity = isset($data->Quantity) ? $data->Quantity : null;
        $this->sku = isset($data->Sku) ? $data->Sku : null;
        $this->unitPrice = isset($data->UnitPrice) ? $data->UnitPrice : null;
        $this->risk = isset($data->Risk) ? $data->Risk : null;
        $this->timeHedge = isset($data->TimeHedge) ? $data->TimeHedge : null;
        $this->type = isset($data->Type) ? $data->Type : null;
        $this->velocityHedge = isset($data->VelocityHedge) ? $data->VelocityHedge : null;  
        
        if (isset($data->Passenger)) {
            $this->passenger = new Passenger();
            $this->passenger->populate($data->Passenger);
        }
    }
    
    public static function fromJson($json)
    {
        $items = new Items();
        $items->populate(json_decode($json));

        return $items;
    }
    
    public function getGiftCategory() 
    {
        return $this->giftCategory;
    }

    public function getHostHedge()
    {
        return $this->hostHedge;
    }

    public function getNonSensicalHedge() 
    {
        return $this->nonSensicalHedge;
    }

    public function getObscenitiesHedge() 
    {
        return $this->obscenitiesHedge;
    }

    public function getPhoneHedge()
    {
        return $this->phoneHedge;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function getQuantity() 
    {
        return $this->quantity;
    }

    public function getSku() 
    {
        return $this->sku;
    }

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function getRisk()
    {
        return $this->risk;
    }

    public function getTimeHedge() 
    {
        return $this->timeHedge;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getVelocityHedge()
    {
        return $this->velocityHedge;
    }

    public function setGiftCategory($giftCategory) 
    {
        $this->giftCategory = $giftCategory;
        return $this;
    }

    public function setHostHedge($hostHedge)
    {
        $this->hostHedge = $hostHedge;
        return $this;
    }

    public function setNonSensicalHedge($nonSensicalHedge) 
    {
        $this->nonSensicalHedge = $nonSensicalHedge;
        return $this;
    }

    public function setObscenitiesHedge($obscenitiesHedge) 
    {
        $this->obscenitiesHedge = $obscenitiesHedge;
        return $this;
    }

    public function setPhoneHedge($phoneHedge) 
    {
        $this->phoneHedge = $phoneHedge;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setQuantity($quantity) 
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    public function setUnitPrice($unitPrice) 
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    public function setRisk($risk) 
    {
        $this->risk = $risk;
        return $this;
    }

    public function setTimeHedge($timeHedge) 
    {
        $this->timeHedge = $timeHedge;
        return $this;
    }

    public function setType($type) 
    {
        $this->type = $type;
        return $this;
    }

    public function setVelocityHedge($velocityHedge) 
    {
        $this->velocityHedge = $velocityHedge;
        return $this;
    }
    
    public function getPassenger() 
    {
        return $this->passenger;
    }

    public function setPassenger(Passenger $passenger) 
    {
        $this->passenger = $passenger;
        return $this;
    }

}