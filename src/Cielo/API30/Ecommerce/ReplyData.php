<?php
namespace Cielo\API30\Ecommerce;

class ReplyData implements \JsonSerializable
{

    private $AddressInfoCode; //String

    private $FactorCode; //String

    private $Score; //int

    private $BinCountry; //String

    private $CardIssuer; //String

    private $CardScheme; //String

    private $HostSeverity; //int

    private $InternetInfoCode; //String

    private $IpRoutingMethod; //String

    private $ScoreModelUsed; //String

    private $CasePriority; //int

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $replyData = new ReplyData();
        $replyData->populate(json_decode($json));

        return $replyData;
    }

    public function populate(\stdClass $data)
    {
        $reflect = new \ReflectionObject($data);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        foreach ($props as $prop) {
            try {
                $this->{$prop->getName()}  =  $data->{$prop->getName()};
            } catch (\Exception $e) {
            }
        }
        return $this;
    }


    public function getAddressInfoCode()
    {
         return $this->AddressInfoCode ;
    }
    public function setAddressInfoCode($AddressInfoCode)
    {
         $this->AddressInfoCode = $AddressInfoCode;
        return $this;
    }

    public function getFactorCode()
    {
         return $this->FactorCode ;
    }
    public function setFactorCode($FactorCode)
    {
         $this->FactorCode = $FactorCode;
        return $this;
    }

    public function getScore()
    {
         return $this->Score ;
    }
    public function setScore($Score)
    {
         $this->Score = $Score;
        return $this;
    }

    public function getBinCountry()
    {
         return $this->BinCountry ;
    }
    public function setBinCountry($BinCountry)
    {
         $this->BinCountry = $BinCountry;
        return $this;
    }

    public function getCardIssuer()
    {
         return $this->CardIssuer ;
    }
    public function setCardIssuer($CardIssuer)
    {
         $this->CardIssuer = $CardIssuer;
        return $this;
    }

    public function getCardScheme()
    {
         return $this->CardScheme ;
    }
    public function setCardScheme($CardScheme)
    {
         $this->CardScheme = $CardScheme;
        return $this;
    }

    public function getHostSeverity()
    {
         return $this->HostSeverity ;
    }
    public function setHostSeverity($HostSeverity)
    {
         $this->HostSeverity = $HostSeverity;
        return $this;
    }

    public function getInternetInfoCode()
    {
         return $this->InternetInfoCode ;
    }
    public function setInternetInfoCode($InternetInfoCode)
    {
         $this->InternetInfoCode = $InternetInfoCode;
        return $this;
    }

    public function getIpRoutingMethod()
    {
         return $this->IpRoutingMethod ;
    }
    public function setIpRoutingMethod($IpRoutingMethod)
    {
         $this->IpRoutingMethod = $IpRoutingMethod;
        return $this;
    }

    public function getScoreModelUsed()
    {
         return $this->ScoreModelUsed ;
    }
    public function setScoreModelUsed($ScoreModelUsed)
    {
         $this->ScoreModelUsed = $ScoreModelUsed;
        return $this;
    }

    public function getCasePriority()
    {
         return $this->CasePriority ;
    }
    public function setCasePriority($CasePriority)
    {
         $this->CasePriority = $CasePriority;
        return $this;
    }
}
