<?php

namespace Cielo\API30\Ecommerce\FraudAnalysis;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class FraudAnalysisShipping
 *
 * @package Cielo\API30\Ecommerce\FraudAnalysis
 */
class FraudAnalysisShipping implements CieloSerializable
{
    /** @var string|null Nome do destinatário da entrega. */
    private $addressee;

    /** @var string|null Tipo de serviço de entrega do produto.
     * “SameDay” (Serviço de entrega no mesmo dia)
     * “OneDay” (Serviço de entrega noturna ou no dia seguinte)
     * “TwoDay” (Serviço de entrega em dois dias)
     * “ThreeDay” (Serviço de entrega em três dias)
     * “LowCost” (Serviço de entrega de baixo custo)
     * “Pickup” (Produto retirado na loja)
     * “Other” (Outro método de entrega)
     * “None” (Sem serviço de entrega, pois é um serviço ou assinatura)
     * */
    private $method;

    /** @var string|null Telefone do destinatário da entrega. Ex. 552133665599 (Código do Pais 55, Código da Cidade 21, Telefone 33665599) */
    private $phone;

    /**
     * FraudAnalysisShipping constructor.
     *
     */
    public function __construct($addressee=null,
                                $method=null,
                                $phone=null)
    {
        $this->addressee = $addressee;
        $this->method = $method;
        $this->phone = $phone;
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
        $this->addressee = isset($data->Addressee) ? $data->Addressee : null;
        $this->method = isset($data->Method) ? $data->Method : null;
        $this->phone = isset($data->Phone) ? $data->Phone : null;
    }

    /**
     * @return mixed
     */
    public function getAddressee()
    {
        return $this->addressee;
    }

    /**
     * @param $addressee
     *
     * @return $this
     */
    public function setAddressee($addressee)
    {
        $this->addressee = $addressee;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}
