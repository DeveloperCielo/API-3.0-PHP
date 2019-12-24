<?php
namespace Cielo\API30\Ecommerce;

class Browser implements \JsonSerializable
{
    private $CookiesAccepted; //boolean

    private $Email; //String

    private $HostName; //String

    private $IpAddress; //String

    private $Type; //String

    public function __construct()
    {
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public static function fromJson($json)
    {
        $browser = new Browser();
        $browser->populate(json_decode($json));

        return $browser;
    }

    public function populate(\stdClass $data)
    {
        $reflect = new \ReflectionObject($data);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED | \ReflectionProperty::IS_PRIVATE);
        foreach ($props as $prop) {
            try{
                $this->{$prop->getName()} = $data->{$prop->getName()};
            }catch (\Exception $e){ }
        }
        return $this;
    }

    public function getCookiesAccepted()
    {
        return $this->CookiesAccepted;
    }
    public function setCookiesAccepted($CookiesAccepted)
    {
         $this->CookiesAccepted = $CookiesAccepted;
    }

    public function getEmail()
    {
         return $this->Email;
    }
    public function setEmail($Email)
    {
         $this->Email = $Email;
    }

    public function getHostName()
    {
         return $this->HostName;
    }
    public function setHostName($HostName)
    {
         $this->HostName = $HostName;
    }

    public function getIpAddress()
    {
         return $this->IpAddress;
    }
    public function setIpAddress($IpAddress)
    {
         $this->IpAddress = $IpAddress;
    }

    public function getType()
    {
         return $this->Type;
    }
    public function setType($Type)
    {
         $this->Type = $Type;
    }
}
