<?php
namespace Cielo\API30\Ecommerce;

class Browser implements \JsonSerializable
{
    const TYPE_CHROME = 'Chrome';
    
    const TYPE_EDGE = 'Edge';
    
    const TYPE_FIREFOX = 'Firefox';
    
    const TYPE_SAFARI = 'Safari';
    
    const TYPE_OPERA = 'Opera';
    
    const TYPE_IE = 'Internet Explorer';
    
    private $cookiesAccepted;

    private $email;
    
    private $hostName;
    
    private $ipAddress;
    
    private $type;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->cookiesAccepted = isset($data->CookiesAccepted) ? $data->CookiesAccepted : null;
        $this->email = isset($data->Email) ? $data->Email : null;
        $this->hostName = isset($data->HostName) ? $data->HostName : null;
        $this->ipAddress = isset($data->IpAddress) ? $data->IpAddress : null;
        $this->type = isset($data->Type) ? $data->Type : null;
    }
    
    public static function fromJson($json)
    {
        $browser = new Browser();
        $browser->populate(json_decode($json));

        return $browser;
    }
    
    public function getCookiesAccepted()
    {
        return $this->cookiesAccepted;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getHostName() 
    {
        return $this->hostName;
    }

    public function getIpAddress() 
    {
        return $this->ipAddress;
    }

    public function getType() 
    {
        return $this->type;
    }

    public function setCookiesAccepted($cookiesAccepted) 
    {
        $this->cookiesAccepted = $cookiesAccepted;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setHostName($hostName) 
    {
        $this->hostName = $hostName;
        return $this;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

}