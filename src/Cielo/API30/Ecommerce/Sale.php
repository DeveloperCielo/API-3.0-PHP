<?php
namespace Cielo\API30\Ecommerce;

class Sale implements \JsonSerializable
{

    private $merchantOrderId;

    private $customer;

    private $payment;
    
    public function __construct($merchantOrderId = null)
    {
        $this->setMerchantOrderId($merchantOrderId);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $dataProps = get_object_vars($data);
        
        if (isset($dataProps['Customer'])) {
            $this->customer = new \Cielo\API30\Ecommerce\Customer();
            $this->customer->populate($data->Customer);
        }
        
        if (isset($dataProps['Payment'])) {
            $this->payment = new \Cielo\API30\Ecommerce\Payment();
            $this->payment->populate($data->Payment);
        }
        
        if (isset($dataProps['MerchantOrderId'])) {
            $this->merchantOrderId = $data->MerchantOrderId;
        }
    }

    public static function fromJson($json)
    {
        $object = json_decode($json);
        
        $sale = new Sale();
        $sale->populate($object);
        
        return $sale;
    }

    public function customer($name)
    {
        $customer = new Customer($name);
        
        $this->setCustomer($customer);
        
        return $customer;
    }

    public function payment($amount, $installments = 1)
    {
        $payment = new Payment($amount, $installments);
        
        $this->setPayment($payment);
        
        return $payment;
    }

    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;
        return $this;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
        return $this;
    }

}