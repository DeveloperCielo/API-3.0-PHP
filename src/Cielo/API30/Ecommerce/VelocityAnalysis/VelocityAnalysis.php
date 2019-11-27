<?php

namespace Cielo\API30\Ecommerce\VelocityAnalysis;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class VelocityAnalysis
 *
 * @package Cielo\API30\Ecommerce\VelocityAnalysis
 */
class VelocityAnalysis implements CieloSerializable
{
    /** @var guid|null 
     * Identificador da análise efetuada
     * Tamanho: 36
     */
    private $id;

    /** @var string|null
     * Accept ou Reject
     * Tamanho: 25
     */
    private $resultMessage;

    /** @var integer 
     * 100
     * Tamanho: 10
     */
    private $score;

    /** @var VelocityAnalysisRejectReasons|null 
     * Razões para rejeição
     */
    private $rejectReasons;

    /**
     * VelocityAnalysis constructor.
     *
     */
    public function __construct($id=null,
                                $resultMessage = null,
                                $score=null)
    {
        $this->id = $id;
        $this->resultMessage = $resultMessage;
        $this->score = $score;
    }

    /**
     * @param $json
     *
     * @return VelocityAnalysis
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $velocityAnalysis = new VelocityAnalysis();

        if (isset($object->VelocityAnalysis)) {
            $velocityAnalysis->populate($object->VelocityAnalysis);
        }

        return $velocityAnalysis;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {

        $this->id = isset($data->Id) ? $data->Id : null;
        $this->resultMessage = isset($data->ResultMessage) ? $data->ResultMessage : null;
        $this->score = isset($data->Score) ? $data->Score : null;

        if (isset($data->RejectReasons)) {
            foreach ($data->RejectReasons as $reject_reason) {
                $velocityRejectReason = new VelocityAnalysisRejectReasons();
                $velocityRejectReason->populate($reject_reason);    
                $this->rejectReasons[] = $velocityRejectReason;
            }
        }
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultMessage()
    {
        return $this->resultMessage;
    }

    /**
     * @param $resultMessage
     *
     * @return $this
     */
    public function setResultMessage($resultMessage)
    {
        $this->resultMessage = $resultMessage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param $score
     *
     * @return $this
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRejectReasons()
    {
        return $this->rejectReasons;
    }

    /**
     * @param $ruleId
     * @param $message
     * 
     * @return VelocityAnalysisRejectReasons
     */
    public function rejectReasons($ruleId, $message)
    {
        $rejectReasons = new VelocityAnalysisRejectReasons($ruleId, $message);

        $this->setRejectReasons($rejectReasons);

        return $rejectReasons;
    }

    /**
     * @param $rejectReasons
     *
     * @return $this
     */
    public function setRejectReasons($rejectReasons)
    {
        $this->rejectReasons = $rejectReasons;

        return $this;
    }

}
