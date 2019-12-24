<?php
namespace Cielo\API30\Ecommerce;

class Item implements \JsonSerializable
{
    private $GiftCategory; //String

    private $HostHedge; //String

    private $NonSensicalHedge; //String

    private $ObscenitiesHedge; //String

    private $PhoneHedge; //String

    private $Quantity; //int

    private $Sku; //String

    private $UnitPrice; //int

    private $Risk; //String

    private $TimeHedge; //String

    private $Type; //String

    private $VelocityHedge; //String

    private $Passenger; //Passenger

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $item = new Item();
        $item->populate(json_decode($json));

        return $item;
    }

    public function populate(\stdClass $data)
    {
        $reflect = new \ReflectionObject($data);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        foreach ($props as $prop) {
            try {
                if ($prop->getName() == 'Passenger') {
                    $this->{$prop->getName()} = (new Passenger())->populate($data->{$prop->getName()});
                } else {
                    $this->{$prop->getName()} = $data->{$prop->getName()};
                }
            } catch (\Exception $e) {
            }
        }
        return $this;
    }


    public function getGiftCategory()
    {
         return $this->GiftCategory ;
    }
    public function setGiftCategory($GiftCategory)
    {
         $this->GiftCategory = $GiftCategory;
        return $this;
    }

    public function getHostHedge()
    {
         return $this->HostHedge ;
    }
    public function setHostHedge($HostHedge)
    {
         $this->HostHedge = $HostHedge;
        return $this;
    }

    public function getNonSensicalHedge()
    {
         return $this->NonSensicalHedge ;
    }
    public function setNonSensicalHedge($NonSensicalHedge)
    {
         $this->NonSensicalHedge = $NonSensicalHedge;
        return $this;
    }

    public function getObscenitiesHedge()
    {
         return $this->ObscenitiesHedge ;
    }
    public function setObscenitiesHedge($ObscenitiesHedge)
    {
         $this->ObscenitiesHedge = $ObscenitiesHedge;
        return $this;
    }

    public function getPhoneHedge()
    {
         return $this->PhoneHedge ;
    }
    public function setPhoneHedge($PhoneHedge)
    {
         $this->PhoneHedge = $PhoneHedge;
        return $this;
    }

    public function getName()
    {
         return $this->Name ;
    }
    public function setName($Name)
    {
         $this->Name = $Name;
        return $this;
    }
    private $Name; //String

    public function getQuantity()
    {
         return $this->Quantity ;
    }
    public function setQuantity($Quantity)
    {
         $this->Quantity = $Quantity;
        return $this;
    }

    public function getSku()
    {
         return $this->Sku ;
    }
    public function setSku($Sku)
    {
         $this->Sku = $Sku;
        return $this;
    }

    public function getUnitPrice()
    {
         return $this->UnitPrice ;
    }
    public function setUnitPrice($UnitPrice)
    {
         $this->UnitPrice = $UnitPrice;
        return $this;
    }

    public function getRisk()
    {
         return $this->Risk ;
    }
    public function setRisk($Risk)
    {
         $this->Risk = $Risk;
        return $this;
    }

    public function getTimeHedge()
    {
         return $this->TimeHedge ;
    }
    public function setTimeHedge($TimeHedge)
    {
         $this->TimeHedge = $TimeHedge;
        return $this;
    }

    public function getType()
    {
         return $this->Type ;
    }
    public function setType($Type)
    {
         $this->Type = $Type;
        return $this;
    }

    public function getVelocityHedge()
    {
         return $this->VelocityHedge ;
    }
    public function setVelocityHedge($VelocityHedge)
    {
         $this->VelocityHedge = $VelocityHedge;
        return $this;
    }

    public function getPassenger()
    {
         return $this->Passenger ;
    }
    public function setPassenger($Passenger)
    {
         $this->Passenger = $Passenger;
        return $this;
    }
}
