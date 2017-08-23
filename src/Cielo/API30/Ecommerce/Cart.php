<?php
namespace Cielo\API30\Ecommerce;

class Cart implements \JsonSerializable
{
    
    private $isGift;

    private $returnsAccepted;
    
    private $items = array();
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->isGift = isset($data->IsGift) ? $data->IsGift : null;
        $this->returnsAccepted = isset($data->ReturnsAccepted) ? $data->ReturnsAccepted : null;
        $this->items = isset($data->Items) ? $data->Items : null;
    }
    
    public static function fromJson($json)
    {
        $cart = new Cart();
        $cart->populate(json_decode($json));

        return $cart;
    }
    
    public function getIsGift() 
    {
        return $this->isGift;
    }

    public function getReturnsAccepted() 
    {
        return $this->returnsAccepted;
    }

    public function setIsGift($isGift) 
    {
        $this->isGift = $isGift;
        return $this;
    }

    public function setReturnsAccepted($returnsAccepted) 
    {
        $this->returnsAccepted = $returnsAccepted;
        return $this;
    }
    
    public function getItems()
    {
        return $this->items;
    }
    
    
    public function setItems(array $items) 
    {
        $this->items = $items;
        return $this;
    }
    
}