<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class CardOnFile
 *
 * @package Cielo\API30\Ecommerce
 */
class CardOnFile implements CieloSerializable
{
    /** @var string|null
     * First se o cartão foi armazenado e é seu primeiro uso.
     * Used se o cartão foi armazenado e ele já foi utilizado anteriormente em outra transação
     */
    private $usage;

    /** @var string|null
     * Indica o propósito de armazenamento de cartões, caso o campo “Usage” for “Used”.
     * Recurring - Compra recorrente programada (ex. assinaturas)
     * Unscheduled - Compra recorrente sem agendamento (ex. aplicativos de serviços)
     * Installments - Parcelamento através da recorrência
     */
    private $reason;

    /**
     * @inheritdoc
     */
    public function populate(\stdClass $data)
    {
        $this->usage = isset($data->Usage) ? $data->Usage : null;
        $this->reason = isset($data->Reason) ? $data->Reason : null;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param $usage
     *
     * @return $this
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param $reason
     *
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

}
