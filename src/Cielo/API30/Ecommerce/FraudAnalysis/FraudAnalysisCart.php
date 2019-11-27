<?php

namespace Cielo\API30\Ecommerce\FraudAnalysis;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class FraudAnalysisCart
 *
 * @package Cielo\API30\Ecommerce\FraudAnalysis
 */
class FraudAnalysisCart implements CieloSerializable
{
    /** @var boolean|null Booleano que indica se o pedido é para presente ou não. */
    private $isGift;
    /** @var boolean|null 	Booleano que define se devoluções são aceitas para o pedido. */
    private $returnsAccepted;
    /** @var FraudAnalysisItem */
    private $items;

    /**
     * FraudAnalysisCart constructor.
     *
     */
    public function __construct($items=null,
                                $isGift=false,
                                $returnsAccepted=false)
    {
        $this->items = is_array($items) ? $items : [$items];
        $this->isGift = $isGift;
        $this->returnsAccepted = $returnsAccepted;
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
        $this->isGift = isset($data->IsGift) ? $data->IsGift : null;
        $this->returnsAccepted = isset($data->ReturnsAccepted) ? $data->ReturnsAccepted : null;
        if (isset($data->Items)) {
            foreach ($data->Items as $item) {
                $analysisItem = new FraudAnalysisItem();
                $analysisItem->populate($item);    
                $this->items[] = $analysisItem;
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
     * @param $name
     * @param $quantity
     * @param $sku
     * @param $unitPrice
     *
     * @return FraudAnalysisItem
     */
    public function item($name, $quantity, $sku, $unitPrice)
    {
        $item = new FraudAnalysisItem($name, $quantity, $sku, $unitPrice);
        $this->items[] = $item;

        return $item;
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
