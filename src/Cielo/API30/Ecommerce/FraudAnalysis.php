<?php
namespace Cielo\API30\Ecommerce;

class FraudAnalysis implements \JsonSerializable
{
    const SEQUENCE_ANALYSE_FIRST = "AnalyseFirst";
    const SEQUENCE_AUTHORIZE_FIRST = "AuthorizeFirst";

    const CRITERIAL_ON_SUCCESS = "OnSuccess";
    const CRITERIAL_AlWAYS = "Always";

    private $Sequence; //String

    private $SequenceCriteria; //String

    private $FingerPrintId; //String

    private $Browser; //Browser

    private $Cart; //Cart

    private $MerchantDefinedFields; //array(MerchantDefinedField)

    private $Shipping; //Shipping

    private $Travel; //Travel

    private $ReplyData; //ReplyData

    private $Id; //String

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $fraudAnalysis = new FraudAnalysis();
        $fraudAnalysis->populate(json_decode($json));

        return $fraudAnalysis;
    }

    public function populate(\stdClass $data)
    {
        $reflect = new \ReflectionClass($data);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        foreach ($props as $prop) {
            try {
                if ($prop->getName() == "MerchantDefinedFields") {
                    $this->{$prop->getName()} = [] ;
                    $temp = $data->{$prop->getName()};
                    foreach ($temp as $row) {
                        $this->{$prop->getName()}[] = (new MerchantDefinedFields())->populate($row);
                    }
                } elseif ($prop->getName() == "Browser") {
                    $this->{$prop->getName()} = (new Browser())->populate($data->{$prop->getName()});
                } elseif ($prop->getName() == "Cart") {
                    $this->{$prop->getName()} = (new Cart())->populate($data->{$prop->getName()});
                } elseif ($prop->getName() == "Shipping") {
                    $this->{$prop->getName()} = (new Shipping())->populate($data->{$prop->getName()});
                } elseif ($prop->getName() == "Travel") {
                    $this->{$prop->getName()} = (new Travel())->populate($data->{$prop->getName()});
                } elseif ($prop->getName() == "ReplyData") {
                    $this->{$prop->getName()} = (new ReplyData())->populate($data->{$prop->getName()});
                } else {
                    $this->{$prop->getName()} = $data->{$prop->getName()};
                }
            } catch (\Exception $e) {
            }
        }
    }

    public function getSequence()
    {
         return $this->Sequence ;
    }
    public function setSequence($Sequence)
    {
         $this->Sequence = $Sequence;
        return $this;
    }

    public function getSequenceCriteria()
    {
         return $this->SequenceCriteria ;
    }
    public function setSequenceCriteria($SequenceCriteria)
    {
         $this->SequenceCriteria = $SequenceCriteria;
        return $this;
    }

    public function getFingerPrintId()
    {
         return $this->FingerPrintId ;
    }
    public function setFingerPrintId($FingerPrintId)
    {
         $this->FingerPrintId = $FingerPrintId;
        return $this;
    }

    public function getBrowser()
    {
         return $this->Browser ;
    }
    public function setBrowser($Browser)
    {
         $this->Browser = $Browser;
        return $this;
    }

    public function getCart()
    {
         return $this->Cart ;
    }
    public function setCart($Cart)
    {
         $this->Cart = $Cart;
        return $this;
    }

    public function getMerchantDefinedFields()
    {
         return $this->MerchantDefinedFields ;
    }
    public function setMerchantDefinedFields($MerchantDefinedFields)
    {
         $this->MerchantDefinedFields = $MerchantDefinedFields;
        return $this;
    }

    public function getShipping()
    {
         return $this->Shipping ;
    }
    public function setShipping($Shipping)
    {
         $this->Shipping = $Shipping;
        return $this;
    }

    public function getTravel()
    {
         return $this->Travel ;
    }
    public function setTravel($Travel)
    {
         $this->Travel = $Travel;
        return $this;
    }
    
    public function getReplyData()
    {
         return $this->ReplyData ;
    }
    public function setReplyData($ReplyData)
    {
         $this->ReplyData = $ReplyData;
        return $this;
    }

    public function getId()
    {
         return $this->Id ;
    }
    public function setId($Id)
    {
         $this->Id = $Id;
        return $this;
    }
}
