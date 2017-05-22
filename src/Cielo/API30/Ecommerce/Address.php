<?php
namespace Cielo\API30\Ecommerce;

class Address implements CieloSerializable
{

    private $street;

    private $number;

    private $complement;

    private $zipCode;

    private $city;

    private $state;

    private $country;

    private $district;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->street = isset($data->Street)? $data->Street: null;
        $this->number = isset($data->Number)? $data->Number: null;
        $this->complement = isset($data->Complement)? $data->Complement: null;
        $this->zipCode = isset($data->ZipCode)? $data->ZipCode: null;
        $this->city = isset($data->City)? $data->City: null;
        $this->state = isset($data->State)? $data->State: null;
        $this->country = isset($data->Country)? $data->Country: null;
        $this->district = isset($data->District)? $data->District: null;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function setComplement($complement)
    {
        $this->complement = $complement;
        return $this;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getDistrict()
    {
        return $this->district;
    }

    public function setDistrict($district)
    {
        $this->district = $district;
        return $this;
    }
}