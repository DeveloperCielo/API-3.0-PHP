<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class Address
 *
 * @package Cielo\API30\Ecommerce
 */
class Address implements CieloSerializable
{
    /** @var string|null 
     * Endereço do Comprador
     * * Tamanho: 255
     */
    private $street;

    /** @var string|null 
     * Número do endereço do Comprador
     * * Tamanho: 15
     */
    private $number;

    /** @var string|null 
     * Complemento do endereço do Comprador
     * * Tamanho: 50
     */
    private $complement;

    /** @var string|null 
     * CEP do endereço do Comprador
     * * Tamanho: 9
     */
    private $zipCode;

    /** @var string|null 
     * Cidade do endereço do Comprador
     * * Tamanho: 50
     */
    private $city;

    /** @var string|null 
     * Estado do endereço do Comprador
     * * Tamanho: 2
     */
    private $state;

    /** @var string|null 
     * Pais do endereço do Comprador
     * * Tamanho: 35
     */
    private $country;

    /** @var string|null 
     * Bairro do Endereço do Comprador
     * * Tamanho: 
     */
    private $district;

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
        $this->street     = isset($data->Street) ? $data->Street : null;
        $this->number     = isset($data->Number) ? $data->Number : null;
        $this->complement = isset($data->Complement) ? $data->Complement : null;
        $this->zipCode    = isset($data->ZipCode) ? $data->ZipCode : null;
        $this->city       = isset($data->City) ? $data->City : null;
        $this->state      = isset($data->State) ? $data->State : null;
        $this->country    = isset($data->Country) ? $data->Country : null;
        $this->district   = isset($data->District) ? $data->District : null;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param $district
     *
     * @return $this
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param $street
     *
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param $complement
     *
     * @return $this
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param $zipCode
     *
     * @return $this
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}
