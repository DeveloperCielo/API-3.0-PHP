<?php

namespace Cielo\API30\Ecommerce;

use Cielo\API30\Ecommerce\Browser;
use Cielo\API30\Ecommerce\Shipping;
use Cielo\API30\Ecommerce\Travel;
use Cielo\API30\Ecommerce\Cart;
use Cielo\API30\Ecommerce\MerchantDefinedFields;
use Cielo\API30\Ecommerce\CieloSerializable;


/**
 * Class FraudAnalysis
 *
 * @package Cielo\API30\Ecommerce
 */
class FraudAnalysis implements \JsonSerializable, CieloSerializable
{
    /** @var string $provider */
    private $provider;

    /** @var string $sequence */
    private $sequence;

    /** @var string $sequenceCriteria */
    private $sequenceCriteria;

    /** @var string $captureOnLowRisk */
    private $captureOnLowRisk;

    /** @var string $voidOnHighRisk */
    private $voidOnHighRisk;

    /** @var string $totalOrderAmount */
    private $totalOrderAmount;

    /** @var string $fingerPrintId */
    private $fingerPrintId;

    /** @var string $browser */
    private $browser;

    /** @var string $cart */
    private $cart;

    /** @var string $merchantDefinedFields */
    private $merchantDefinedFields;

    /** @var string $shipping */
    private $shipping;

    /** @var string $travel */
    private $travel;

    /** @var string $replyData */
    private $replyData;

    /** @var string $addressInfoCode */
    private $addressInfoCode;

    /** @var string $factorCode */
    private $factorCode;

    /** @var string $score */
    private $score;

    /** @var string $binCountry */
    private $binCountry;

    /** @var string $cardIssuer */
    private $cardIssuer;

    /** @var string $cardScheme */
    private $cardScheme;

    /** @var string $hostSeverity */
    private $hostSeverity;

    /** @var string $internetInfoCode */
    private $internetInfoCode;

    /** @var string $ipRoutingMethod */
    private $ipRoutingMethod;

    /** @var string $scoreModelUsed */
    private $scoreModelUsed;

    /** @var string $casePriority */
    private $casePriority;

    /**
     * Fraud Analysis constructor.
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

        $this->provider             = isset($data->Provider) ? $data->Provider : null;
        $this->sequence             = isset($data->Sequence) ? $data->Sequence : null;
        $this->sequenceCriteria     = isset($data->SequenceCriteria) ? $data->SequenceCriteria : null;
        $this->captureOnLowRisk     = isset($data->CaptureOnLowRisk) ? $data->CaptureOnLowRisk : null;
        $this->voidOnHighRisk       = isset($data->VoidOnHighRisk) ? $data->VoidOnHighRisk : null;
        $this->totalOrderAmount     = isset($data->TotalOrderAmount) ? $data->TotalOrderAmount : null;
        $this->fingerPrintId        = isset($data->FingerPrintId) ? $data->FingerPrintId : null;
        $this->addressInfoCode      = isset($data->AddressInfoCode) ? $data->AddressInfoCode : null;
        $this->factorCode           = isset($data->FactorCode) ? $data->FactorCode : null;
        $this->score                = isset($data->Score) ? $data->Score : null;
        $this->binCountry           = isset($data->BinCountry) ? $data->BinCountry : null;
        $this->cardIssuer           = isset($data->CardIssuer) ? $data->CardIssuer : null;
        $this->cardScheme           = isset($data->CardScheme) ? $data->CardScheme : null;
        $this->hostSeverity         = isset($data->HostSeverity) ? $data->HostSeverity : null;
        $this->internetInfoCode     = isset($data->InternetInfoCode) ? $data->InternetInfoCode : null;
        $this->ipRoutingMethod      = isset($data->IpRoutingMethod) ? $data->IpRoutingMethod : null;
        $this->scoreModelUsed       = isset($data->ScoreModelUsed) ? $data->ScoreModelUsed : null;
        $this->casePriority         = isset($data->CasePriority) ? $data->CasePriority : null;
        
        if (isset($data->Browser)) {
            $this->browser = new Browser();
            $this->browser->populate($data->Browser);
        }

        if (isset($data->Cart)) {
            $this->cart = new Cart();
            $this->cart->populate($data->Cart);
        }

        if (isset($data->MerchantDefinedFields)) {
            foreach($data->MerchantDefinedFields as $merchantDefinedField){
            
                $merchantDefinedFieldsInstance = new MerchantDefinedFields();
                $merchantDefinedFieldsInstance->populate($merchantDefinedField);

                $this->merchantDefinedFields [] = $merchantDefinedFieldsInstance;
            }
        }

        if (isset($data->Shipping)) {
            $this->shipping = new Shipping();
            $this->shipping->populate($data->Shipping);
        }

        if (isset($data->Travel)) {
            $this->travel = new Travel();
            $this->travel->populate($data->Travel);
        }

        if (isset($data->ReplyData)) {
            $this->replyData = new ReplyData();
            $this->replyData->populate($data->ReplyData);
        }
    }

    /**
     * @return mixed
    */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param $provider
     *
     * @return $this
    */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param $sequence
     *
     * @return $this
    */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getSequenceCriteria()
    {
        return $this->sequenceCriteria;
    }

    /**
     * @param $sequenceCriteria
     *
     * @return $this
    */
    public function setSequenceCriteria($sequenceCriteria)
    {
        $this->sequenceCriteria = $sequenceCriteria;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getCaptureOnLowRisk()
    {
        return $this->captureOnLowRisk;
    }

    /**
     * @param $captureOnLowRisk
     *
     * @return $this
    */
    public function setCaptureOnLowRisk($captureOnLowRisk)
    {
        $this->captureOnLowRisk = $captureOnLowRisk;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getVoidOnHighRisk()
    {
        return $this->voidOnHighRisk;
    }

    /**
     * @param $voidOnHighRisk
     *
     * @return $this
    */
    public function setVoidOnHighRisk($voidOnHighRisk)
    {
        $this->voidOnHighRisk = $voidOnHighRisk;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getTotalOrderAmount()
    {
        return $this->totalOrderAmount;
    }

    /**
     * @param $totalOrderAmount
     *
     * @return $this
    */
    public function setTotalOrderAmount($totalOrderAmount)
    {
        $this->totalOrderAmount = $totalOrderAmount;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getFingerPrintId()
    {
        return $this->fingerPrintId;
    }

    /**
     * @param $fingerPrintId
     *
     * @return $this
    */
    public function setFingerPrintId($fingerPrintId)
    {
        $this->fingerPrintId = $fingerPrintId;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param $browser
     *
     * @return $this
    */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param $cart
     *
     * @return $this
    */
    public function setCart($cart)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getMerchantDefinedFields()
    {
        return $this->merchantDefinedFields;
    }

    /**
     * @param $merchantDefinedFields
     *
     * @return $this
    */
    public function setMerchantDefinedFields($merchantDefinedFields)
    {
        $this->merchantDefinedFields = $merchantDefinedFields;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param $shipping
     *
     * @return $this
    */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getTravel()
    {
        return $this->travel;
    }

    /**
     * @param $travel
     *
     * @return $this
    */
    public function setTravel($travel)
    {
        $this->travel = $travel;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getReplyData()
    {
        return $this->replyData;
    }

    /**
     * @param $replyData
     *
     * @return $this
    */
    public function setReplyData($replyData)
    {
        $this->replyData = $replyData;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getAddressInfoCode()
    {
        return $this->addressInfoCode;
    }

    /**
     * @param $addressInfoCode
     *
     * @return $this
    */
    public function setAddressInfoCode($addressInfoCode)
    {
        $this->addressInfoCode = $addressInfoCode;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getFactorCode()
    {
        return $this->factorCode;
    }

    /**
     * @param $factorCode
     *
     * @return $this
    */
    public function setFactorCode($factorCode)
    {
        $this->factorCode = $factorCode;

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
    public function getBinCountry()
    {
        return $this->binCountry;
    }

    /**
     * @param $binCountry
     *
     * @return $this
    */
    public function setBinCountry($binCountry)
    {
        $this->binCountry = $binCountry;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getCardIssuer()
    {
        return $this->cardIssuer;
    }

    /**
     * @param $cardIssuer
     *
     * @return $this
    */
    public function setCardIssuer($cardIssuer)
    {
        $this->cardIssuer = $cardIssuer;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getCardScheme()
    {
        return $this->cardScheme;
    }

    /**
     * @param $cardScheme
     *
     * @return $this
    */
    public function setCardScheme($cardScheme)
    {
        $this->cardScheme = $cardScheme;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getHostSeverity()
    {
        return $this->hostSeverity;
    }

    /**
     * @param $hostSeverity
     *
     * @return $this
    */
    public function setHostSeverity($hostSeverity)
    {
        $this->hostSeverity = $hostSeverity;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getInternetInfoCode()
    {
        return $this->internetInfoCode;
    }

    /**
     * @param $internetInfoCode
     *
     * @return $this
    */
    public function setInternetInfoCode($internetInfoCode)
    {
        $this->internetInfoCode = $internetInfoCode;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getIpRoutingMethod()
    {
        return $this->ipRoutingMethod;
    }

    /**
     * @param $ipRoutingMethod
     *
     * @return $this
    */
    public function setIpRoutingMethod($ipRoutingMethod)
    {
        $this->ipRoutingMethod = $ipRoutingMethod;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getScoreModelUsed()
    {
        return $this->scoreModelUsed;
    }

    /**
     * @param $scoreModelUsed
     *
     * @return $this
    */
    public function setScoreModelUsed($scoreModelUsed)
    {
        $this->scoreModelUsed = $scoreModelUsed;

        return $this;
    }

    /**
     * @return mixed
    */
    public function getCasePriority()
    {
        return $this->casePriority;
    }

    /**
     * @param $casePriority
     *
     * @return $this
    */
    public function setCasePriority($casePriority)
    {
        $this->casePriority = $casePriority;

        return $this;
    }
}
