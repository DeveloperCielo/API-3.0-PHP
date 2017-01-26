<?php
namespace Cielo\API30\Ecommerce;

class Cart implements \JsonSerializable
{

    private $IsGift; //boolean

    private $ReturnsAccepted; //boolean

    private $Items; //array(Item)
    
    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $cart = new Cart();
        $cart->populate(json_decode($json));

        return $cart;
    }

    public function populate(\stdClass $data)
    {
        $reflect = new \ReflectionClass($data);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        foreach ($props as $prop) {
            try {
                if ($prop->getName() == "Items") {
                    $this->{$prop->getName()} = [] ;
                    $temp = $data->{$prop->getName()};
                    foreach ($temp as $row) {
                        $this->{$prop->getName()}[] = (new Item())->populate($row);
                    }
                } else {
                    $this->{$prop->getName()} = $data->{$prop->getName()};
                }
            } catch (\Exception $e) {
            }
        }
    }


    public function getIsGift()
    {
         return $this->IsGift ;
    }
    public function setIsGift($IsGift)
    {
         $this->IsGift = $IsGift;
        return $this;
    }

    public function getReturnsAccepted()
    {
         return $this->ReturnsAccepted ;
    }
    public function setReturnsAccepted($ReturnsAccepted)
    {
         $this->ReturnsAccepted = $ReturnsAccepted;
        return $this;
    }

    public function getItems()
    {
         return $this->Items ;
    }
    public function setItems($Items)
    {
         $this->Items = $Items;
        return $this;
    }
}
