<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class Sale
 *
 * @package Cielo\API30\Ecommerce
 */
class Sale implements \JsonSerializable
{
    private $merchantOrderId;
    private $customer;
    private $payment;

    /**
     * Sale constructor.
     *
     * @param null $merchantOrderId
     */
    public function __construct($merchantOrderId = null)
    {
        $this->setMerchantOrderId($merchantOrderId);
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
        $dataProps = get_object_vars($data);

        if (isset($dataProps['Customer'])) {
            $this->customer = new Customer();
            $this->customer->populate($data->Customer);
        }

        if (isset($dataProps['Payment'])) {
            $this->payment = new Payment();
            $this->payment->populate($data->Payment);
        }

        if (isset($dataProps['MerchantOrderId'])) {
            $this->merchantOrderId = $data->MerchantOrderId;
        }
    }

    /**
     * @param $json
     *
     * @return Sale
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $sale = new self();
        $sale->populate($object);

        return $sale;
    }

    /**
     * @param $name
     *
     * @return Customer
     */
    public function customer($name)
    {
        $customer = new Customer($name);

        $this->setCustomer($customer);

        return $customer;
    }

    /**
     * @param $amount
     * @param int $installments
     *
     * @return Payment
     */
    public function payment($amount, $installments = 1)
    {
        $payment = new Payment($amount, $installments);

        $this->setPayment($payment);

        return $payment;
    }

    /**
     * @return mixed
     */
    public function getMerchantOrderId()
    {
        return $this->merchantOrderId;
    }

    /**
     * @param $merchantOrderId
     *
     * @return $this
     */
    public function setMerchantOrderId($merchantOrderId)
    {
        $this->merchantOrderId = $merchantOrderId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return $this
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param Payment $payment
     *
     * @return $this
     */
    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;

        return $this;
    }
}
