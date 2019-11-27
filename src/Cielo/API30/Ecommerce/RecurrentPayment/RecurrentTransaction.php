<?php

namespace Cielo\API30\Ecommerce\RecurrentPayment;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class RecurrentTransaction
 *
 * @package Cielo\API30\Ecommerce\RecurrentPayment
 */
class RecurrentTransaction implements CieloSerializable
{
    /** @var guid|null 
     * Id da Recorrência
     * Tamanho: 36
     * Formato: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
     */
    private $recurrentPaymentId;

    /** @var guid|null 
     * Payment ID da transação gerada na recorrência
     * Tamanho: 36
     * Formato: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
     */
    private $transactionId;

    /** @var integer|null 
     * Número da Recorrência. A primeira é zero
     * Tamanho: 2
     * Formato:
     */
    private $paymentNumber;

    /** @var integer|null 
     * Número da tentativa atual na recorrência específica
     * Tamanho: 2
     * Formato:
     */
    private $tryNumber;

    /**
     * RecurrentTransaction constructor.
     * Tamanho:
     * Formato:
     *
     */
    public function __construct($recurrentPaymentId = null,
                                $transactionId = null, 
                                $paymentNumber = 0, 
                                $tryNumber = 0)
    {
        $this->recurrentPaymentId = $recurrentPaymentId;
        $this->transactionId = $transactionId;
        $this->paymentNumber = $paymentNumber;
        $this->tryNumber = $tryNumber;
    }

    /**
     * @param $json
     *
     * @return RecurrentTransaction
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $recurrent_transaction = new RecurrentTransaction();

        if (isset($object->RecurrentTransaction)) {
            $recurrent_transaction->populate($object->RecurrentTransaction);
        }

        return $recurrent_transaction;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->recurrentPaymentId = isset($data->RecurrentPaymentId) ? $data->RecurrentPaymentId : null;
        $this->transactionId = isset($data->TransactionId) ? $data->TransactionId : null;
        $this->paymentNumber = isset($data->PaymentNumber) ? $data->PaymentNumber : 0;
        $this->tryNumber = isset($data->TryNumber) ? $data->TryNumber : 0;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getRecurrentPaymentId()
    {
        return $this->recurrentPaymentId;
    }


    /**
     * @param $recurrentPaymentId
     *
     * @return $this
     */
    public function setRecurrentPaymentId($recurrentPaymentId)
    {
        $this->recurrentPaymentId = $recurrentPaymentId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }


    /**
     * @param $transactionId
     *
     * @return $this
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentNumber()
    {
        return $this->paymentNumber;
    }


    /**
     * @param $paymentNumber
     *
     * @return $this
     */
    public function setPaymentNumber($paymentNumber)
    {
        $this->paymentNumber = $paymentNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTryNumber()
    {
        return $this->tryNumber;
    }


    /**
     * @param $tryNumber
     *
     * @return $this
     */
    public function setTryNumber($tryNumber)
    {
        $this->tryNumber = $tryNumber;

        return $this;
    }

}
