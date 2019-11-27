<?php

namespace Cielo\API30\Ecommerce\RecurrentPayment;

/**
 * Class RecurrentPayment
 *
 * @package Cielo\API30\Ecommerce\RecurrentPayment
 */
class RecurrentPayment implements \JsonSerializable
{

    const INTERVAL_MONTHLY = 'Monthly';

    const INTERVAL_BIMONTHLY = 'Bimonthly';

    const INTERVAL_QUARTERLY = 'Quarterly';

    const INTERVAL_SEMIANNUAL = 'SemiAnnual';

    const INTERVAL_ANNUAL = 'Annual';

    /** @var boolean|null 
     * Booleano para saber se a primeira recorrencia já vai ser Autorizada ou não.
     * Formato: true, false
     */
    private $authorizeNow;

    /** @var guid|null 
     * Campo Identificador da próxima recorrência.
     * Tamanho: 26
     * Formato: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx
     */
    private $recurrentPaymentId;

    /** @var string|null 
     * Data da próxima recorrência.
     * Tamanho: 7
     * Formato: 2017-06-07 (YYYY/MM/DD)
     */
    private $nextRecurrency;

    /** @var string|null 
     * Data do inicio da recorrência.
     * Tamanho: 7
     * Formato: 2017-06-07 (YYYY/MM/DD)
     */
    private $startDate;

    /** @var string|null 
     * Data do fim da recorrência.
     * Tamanho: 7
     * Formato: 2017-06-07 (YYYY/MM/DD)
     */
    private $endDate;

    /** @var string|null 
     * Intervalo entre as recorrência.
     * Tamanho: 10
     * Formato: Monthly / Bimonthly / Quarterly / SemiAnnual / Annual
     */
    private $interval;

    /** @var integer|null 
     * Valor do Pedido (ser enviado em centavos)
     * Tamanho: 15
     */
    private $amount;

    /** @var string|null 
     * Pais no qual o pagamento será feito
     * Tamanho: 3
     */
    private $country;

    /**
     */
    private $createDate;

    /** @var string 
     * Moeda na qual o pagamento será feito (BRL)
     * Tamanho: 3
     */
    private $currency;

    /** @var integer|null 
     * Indica o número de tentativa da recorrência atual
     * Tamanho: 1
     */
    private $currentRecurrencyTry;

    /**
     */
    private $provider;

    /** @var integer|null 
     * Dia da Recorrência
     * Tamanho: 2
     */
    private $recurrencyDay;

    /** @var integer|null 
     * Quantidade de recorrência realizada com sucesso
     * Tamanho: 2
     */
    private $successfulRecurrences;

    /** 
     */
    private $links;

    /** @var RecurrentTransaction */
    private $recurrentTransactions;

    /** 
     */
    private $reasonCode;

    /** 
     */
    private $reasonMessage;

    /** @var integer|null 
     * Status do pedido recorrente
     * Tamanho: 1
     * Formato: 
     * 1 - Ativo 
     * 2 - Finalizado 
     * 3- Desativada pelo Lojista 
     * 4 - Desativada por numero de retentativas 
     * 5 - Desativada por cartão de crédito vencido
     */
    private $status;

    /**
     * RecurrentPayment constructor.
     *
     * @param bool $authorizeNow
     */
    public function __construct($authorizeNow = true)
    {
        $this->setAuthorizeNow($authorizeNow);
    }

    /**
     * @param $json
     *
     * @return RecurrentPayment
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $recurrentPayment = new RecurrentPayment();

        if (isset($object->RecurrentPayment)) {
            $recurrentPayment->populate($object->RecurrentPayment);
        }

        return $recurrentPayment;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->authorizeNow       = isset($data->AuthorizeNow) ? !!$data->AuthorizeNow : false;
        $this->recurrentPaymentId = isset($data->RecurrentPaymentId) ? $data->RecurrentPaymentId : null;
        $this->nextRecurrency     = isset($data->NextRecurrency) ? $data->NextRecurrency : null;
        $this->startDate          = isset($data->StartDate) ? $data->StartDate : null;
        $this->endDate            = isset($data->EndDate) ? $data->EndDate : null;
        $this->interval           = isset($data->Interval) ? $data->Interval : null;

        $this->amount                = isset($data->Amount) ? $data->Amount : null;
        $this->country               = isset($data->Country) ? $data->Country : null;
        $this->createDate            = isset($data->CreateDate) ? $data->CreateDate : null;
        $this->currency              = isset($data->Currency) ? $data->Currency : null;
        $this->currentRecurrencyTry  = isset($data->CurrentRecurrencyTry) ? $data->CurrentRecurrencyTry : null;
        $this->provider              = isset($data->Provider) ? $data->Provider : null;
        $this->recurrencyDay         = isset($data->RecurrencyDay) ? $data->RecurrencyDay : null;
        $this->successfulRecurrences = isset($data->SuccessfulRecurrences) ? $data->SuccessfulRecurrences : null;

        $this->links                 = isset($data->Links) ? $data->Links : [];

        $this->recurrentTransactions = [];
        if (isset($data->recurrentTransactions)) {
            foreach ($data->recurrentTransactions as $recurrentTransaction) {
                $recurrentTrans = new RecurrentTransaction();
                $recurrentTrans->populate($recurrentTransaction);    
                $this->recurrentTransactions[] = $recurrentTrans;
            }      
        }

        $this->reasonCode    = isset($data->ReasonCode) ? $data->ReasonCode : null;
        $this->reasonMessage = isset($data->ReasonMessage) ? $data->ReasonMessage : null;
        $this->status        = isset($data->Status) ? $data->Status : null;
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
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @return mixed
     */
    public function getReasonMessage()
    {
        return $this->reasonMessage;
    }

    /**
     * @return mixed
     */
    public function getNextRecurrency()
    {
        return $this->nextRecurrency;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getCurrentRecurrencyTry()
    {
        return $this->currentRecurrencyTry;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @return mixed
     */
    public function getRecurrencyDay()
    {
        return $this->recurrencyDay;
    }

    /**
     * @return mixed
     */
    public function getSuccessfulRecurrences()
    {
        return $this->successfulRecurrences;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getAuthorizeNow()
    {
        return $this->authorizeNow;
    }

    /**
     * @param $authorizeNow
     *
     * @return $this
     */
    public function setAuthorizeNow($authorizeNow)
    {
        $this->authorizeNow = $authorizeNow;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param $startDate
     *
     * @return $this
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param $endDate
     *
     * @return $this
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param $interval
     *
     * @return $this
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;

        return $this;
    }
}
