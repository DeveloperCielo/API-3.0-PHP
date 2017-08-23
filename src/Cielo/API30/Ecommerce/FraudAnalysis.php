<?php
namespace Cielo\API30\Ecommerce;

class FraudAnalysis implements \JsonSerializable
{

    const SEQUENCE_AUTHORIZE_FIRST = 'AuthorizeFirst';
    
    const SEQUENCE_CRITERIA_ONSUCESS = 'OnSuccess';
    
    const SEQUENCE_CRITERIA_ALWAYS = 'Always';
    
    private $sequence;

    private $sequenceCriteria;
    
    private $fingerPrintId;
    
    private $browser;
    
    private $cart;
    
    private $merchantDefinedFields = array();
    
    private $shipping;
    
    private $travel;
    
    private $id;
    
    private $status;
    
    private $replyData;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->sequence = isset($data->Sequence) ? $data->Sequence : null;
        $this->sequenceCriteria = isset($data->SequenceCriteria) ? $data->SequenceCriteria : null;
        $this->fingerPrintId = isset($data->FingerPrintId) ? $data->FingerPrintId : null;
        $this->merchantDefinedFields = isset($data->MerchantDefinedFields) ? $data->MerchantDefinedFields : null;
    
        if (isset($data->Browser)) {
            $this->browser = new Browser();
            $this->browser->populate($data->Browser);
        }
    
        if (isset($data->Cart)) {
            $this->cart = new Cart();
            $this->cart->populate($data->Cart);
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
    
    public static function fromJson($json)
    {
        $fraudAnalysis = new FraudAnalysis();
        $fraudAnalysis->populate(json_decode($json));

        return $fraudAnalysis;
    }

    public function getSequence()
    {
        return $this->sequence;
    }

    public function getSequenceCriteria() 
    {
        return $this->sequenceCriteria;
    }

    public function getFingerPrintId()
    {
        return $this->fingerPrintId;
    }

    public function getBrowser() 
    {
        return $this->browser;
    }

    public function getCart() 
    {
        return $this->cart;
    }

    public function getMerchantDefinedFields() 
    {
        return $this->merchantDefinedFields;
    }

    public function getShipping()
    {
        return $this->shipping;
    }

    public function getTravel() 
    {
        return $this->travel;
    }

    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    public function setSequenceCriteria($sequenceCriteria) 
    {
        $this->sequenceCriteria = $sequenceCriteria;
        return $this;
    }

    public function setFingerPrintId($fingerPrintId) 
    {
        $this->fingerPrintId = $fingerPrintId;
        return $this;
    }

    public function setBrowser(Browser $browser)
    {
        $this->browser = $browser;
        return $this;
    }

    public function setCart(Cart $cart) 
    {
        $this->cart = $cart;
        return $this;
    }

    public function setMerchantDefinedFields(array $merchantDefinedFields) 
    {
        $this->merchantDefinedFields = $merchantDefinedFields;
        return $this;
    }

    public function setShipping(Shipping $shipping) 
    {
        $this->shipping = $shipping;
        return $this;
    }

    public function setTravel(Travel $travel) 
    {
        $this->travel = $travel;
        return $this;
    }
    
    public function getId() 
    {
        return $this->id;
    }

    public function getStatus() 
    {
        return $this->status;
    }

    public function getReplyData() 
    {
        return $this->replyData;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setStatus($status) 
    {
        $this->status = $status;
        return $this;
    }

    public function setReplyData(ReplyData $replyData) 
    {
        $this->replyData = $replyData;
        return $this;
    }

}