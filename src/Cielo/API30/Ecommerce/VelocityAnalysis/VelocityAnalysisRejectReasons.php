<?php

namespace Cielo\API30\Ecommerce\VelocityAnalysis;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class VelocityAnalysisRejectReasons
 *
 * @package Cielo\API30\Ecommerce\VelocityAnalysis
 */
class VelocityAnalysisRejectReasons implements CieloSerializable
{
    /** @var integer|null
     * Código da Regra que rejeitou
     * Tamanho: 10
     */
    private $ruleId;

    /** @var string|null 
     * Descrição da Regra que rejeitou
     * Tamanho: 512
     */
    private $message;

    /**
     * VelocityAnalysisRejectReasons constructor.
     *
     */
    public function __construct($ruleId = null, $message = null)
    {
        $this->ruleId = $ruleId;
        $this->message = $message;
    }

    /**
     * @param $json
     *
     * @return VelocityAnalysisRejectReasons
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $velocityAnalysisRejectReasons = new VelocityAnalysisRejectReasons();

        if (isset($object->VelocityAnalysisRejectReasons)) {
            $velocityAnalysisRejectReasons->populate($object->VelocityAnalysisRejectReasons);
        }

        return $velocityAnalysisRejectReasons;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->ruleId = isset($data->RuleId) ? $data->RuleId : null;
        $this->message = isset($data->Message) ? $data->Message : null;
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
    public function getRuleId()
    {
        return $this->ruleId;
    }

    /**
     * @param $ruleId
     *
     * @return $this
     */
    public function setRuleId($ruleId)
    {
        $this->ruleId = $ruleId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     *
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

}
