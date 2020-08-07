<?php

namespace Cielo\API30\Ecommerce;

use Cielo\API30\Ecommerce\CieloSerializable;
use Cielo\API30\Ecommerce\Items;
/**
 * Class Cart
 *
 * @package Cielo\API30\Ecommerce
 */
class Cart implements \JsonSerializable, CieloSerializable
{
    /** @var string $isGift */
    private $isGift;

    /** @var string $returnsAccepted */
    private $returnsAccepted;

    /** @var string $items */
    private $items;

    /**
     * Cart constructor.
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
        $this->isGift           = isset($data->IsGift) ? $data->IsGift : null;
        $this->returnsAccepted  = isset($data->ReturnsAccepted) ? $data->ReturnsAccepted : null;
        
        if (isset($data->Items)) {
            foreach($data->Items as $item){
                $itemsInstance = new Items();
                $itemsInstance->populate($item);

                $this->items [] = $itemsInstance;
            }
        }
    }

    /**
     * @return mixed
    */
    public function getIsGift()
    {
        return $this->isGift;
    }

    /**
     * @param $isGift
     *
     * @return $this
    */
    public function setIsGift($isGift)
    {
        $this->isGift = $isGift;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getReturnsAccepted()
    {
        return $this->returnsAccepted;
    }

    /**
     * @param $returnsAccepted
     *
     * @return $this
    */
    public function setReturnsAccepted($returnsAccepted)
    {
        $this->returnsAccepted = $returnsAccepted;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param $items
     *
     * @return $this
    */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }
}
