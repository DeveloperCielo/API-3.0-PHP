<?php
namespace Cielo\API30\Ecommerce;

class MerchantDefinedFields implements \JsonSerializable
{
    
    private $id;
    
    private $value;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->id = isset($data->id) ? $data->id : null;
        $this->value = isset($data->Value) ? $data->Value : null;
    }
    
    public static function fromJson($json)
    {
        $merchantDefinedFields = new MerchantDefinedFields();
        $merchantDefinedFields->populate(json_decode($json));

        return $merchantDefinedFields;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getValue() 
    {
        return $this->value;
    }

    public function setId($id) 
    {
        $this->id = $id;
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

}