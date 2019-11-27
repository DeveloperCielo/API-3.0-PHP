<?php

namespace Cielo\API30\Ecommerce\FraudAnalysis;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class FraudAnalysisPassenger
 *
 * @package Cielo\API30\Ecommerce\FraudAnalysis
 */
class FraudAnalysisPassenger implements CieloSerializable
{ 
    /** @var string|null Email do Passageiro. */
    private $email;

    /** @var string|null Id do passageiro a quem o bilheite foi emitido. */
    private $identity;

    /** @var string|null Nome do passageiro. */
    private $name;

    /** @var string|null Classificação do Passageiro. Valores do Campo:
     * “Adult” (Passageiro adulto)
     * “Child”(Passageiro criança)
     * “Infant”(Passageiro infantil)
     * “Youth”(Passageiro adolescente)
     * “Student”(Passageiro estudante)
     * “SeniorCitizen“(Passageiro idoso)
     * “Military“(Passageiro militar) 
     * */
    private $rating;
    
    /** @var string|null Número do telefone do passageiro. 
     * Para pedidos fora do U.S., a CyberSource recomenda que inclua o código do país.
     * 552133665599 (Ex. Código do Pais 55, Código da Cidade 21, Telefone 33665599).
     * */
    private $phone;

    /** @var string|null Classificação da empresa aérea. Pode-se usar valores como Gold ou Platina. */
    private $status;

    /** @var FraudAnalysisTravelLegs|null */
    private $travelLegs;

    /**
     * FraudAnalysisPassenger constructor.
     *
     */
    public function __construct($email=null,
                                $identity=null,
                                $name=null,
                                $rating=null,
                                $phone=null,
                                $status=null,
                                $travelLegs=null)
    {
        $this->email = $email;
        $this->identity = $identity;
        $this->name = $name;
        $this->rating = $rating;
        $this->phone = $phone;
        $this->status = $status;
        $this->travelLegs = $travelLegs;
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
        $this->email = isset($data->Email) ? $data->Email: null;
        $this->identity = isset($data->Identity) ? $data->Identity: null;
        $this->name = isset($data->Name) ? $data->Name: null;
        $this->rating = isset($data->Rating) ? $data->Rating: null;
        $this->phone = isset($data->Phone) ? $data->Phone: null;
        $this->status = isset($data->Status) ? $data->Status: null;
        
        if (isset($data->TravelLegs)) {
            $this->travelLegs = new FraudAnalysisTravelLegs();
            $this->travelLegs->populate($data->TravelLegs);
        }
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param $identity
     *
     * @return $this
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param $rating
     *
     * @return $this
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTravelLegs()
    {
        return $this->travelLegs;
    }

    /**
     * @param $travelLegs
     *
     * @return $this
     */
    public function setTravelLegs($travelLegs)
    {
        $this->travelLegs = $travelLegs;

        return $this;
    }
}
