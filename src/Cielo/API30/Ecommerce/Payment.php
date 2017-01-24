<?php
namespace Cielo\API30\Ecommerce;

class Payment implements \JsonSerializable
{

    const PAYMENTTYPE_CREDITCARD = 'CreditCard';

    const PAYMENTTYPE_DEBITCARD = 'DebitCard';

    const PAYMENTTYPE_ELECTRONIC_TRANSFER = 'ElectronicTransfer';

    const PAYMENTTYPE_BOLETO = 'Boleto';

    const PROVIDER_BRADESCO = 'Bradesco';

    const PROVIDER_BANCO_DO_BRASIL = 'BancoDoBrasil';

    const PROVIDER_SIMULADO = 'Simulado';

    private $serviceTaxAmount;

    private $installments;

    private $interest;

    private $capture = false;

    private $authenticate = false;

    private $recurrent;

    private $recurrentPayment;

    private $creditCard;

    private $debitCard;

    private $authenticationUrl;

    private $tid;

    private $proofOfSale;

    private $authorizationCode;

    private $softDescriptor = "";

    private $returnUrl;

    private $provider;

    private $paymentId;

    private $type;

    private $amount;

    private $receivedDate;

    private $capturedAmount;

    private $capturedDate;

    private $currency;

    private $country;

    private $returnCode;

    private $returnMessage;

    private $status;

    private $links;

    private $extraDataCollection;

    private $expirationDate;

    private $url;

    private $number;

    private $boletoNumber;

    private $barCodeNumber;

    private $digitableLine;

    private $address;

    public function __construct($amount = 0, $installments = 1)
    {
        $this->setAmount($amount);
        $this->setInstallments($installments);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {

        $this->serviceTaxAmount = isset($data->ServiceTaxAmount)? $data->ServiceTaxAmount: null;
        $this->installments = isset($data->Installments)? $data->Installments: null;
        $this->interest = isset($data->Interest)? $data->Interest: null;
        $this->capture = isset($data->Capture)? ! ! $data->Capture: false;
        $this->authenticate = isset($data->Authenticate)? ! ! $data->Authenticate: false;
        $this->recurrent = isset($data->Recurrent)? ! ! $data->Recurrent: false;

        if (isset($data->RecurrentPayment)) {
            $this->recurrentPayment = new RecurrentPayment(false);
            $this->recurrentPayment->populate($data->RecurrentPayment);
        }

        if (isset($data->CreditCard)) {
            $this->creditCard = new CreditCard();
            $this->creditCard->populate($data->CreditCard);
        }

        if (isset($data->DebitCard)) {
            $this->debitCard = new CreditCard();
            $this->debitCard->populate($data->DebitCard);
        }
        
        $this->expirationDate  =  isset($data->ExpirationDate)?$data->ExpirationDate: null;
        $this->url             =  isset($data->Url)?$data->Url: null;
        $this->boletoNumber    =  isset($data->BoletoNumber)? $data->BoletoNumber: null;
        $this->barCodeNumber   =  isset($data->BarCodeNumber)?$data->BarCodeNumber: null;
        $this->digitableLine   =  isset($data->DigitableLine)?$data->DigitableLine: null;
        $this->address         =  isset($data->Address)?$data->Address: null;

        $this->authenticationUrl = isset($data->AuthenticationUrl)? $data->AuthenticationUrl: null;
        $this->tid = isset($data->Tid)? $data->Tid: null;
        $this->proofOfSale = isset($data->ProofOfSale)? $data->ProofOfSale: null;
        $this->authorizationCode = isset($data->AuthorizationCode)? $data->AuthorizationCode: null;
        $this->softDescriptor = isset($data->SoftDescriptor)? $data->SoftDescriptor: null;
        $this->provider = isset($data->Provider)? $data->Provider: null;
        $this->paymentId = isset($data->PaymentId)? $data->PaymentId: null;
        $this->type = isset($data->Type)? $data->Type: null;
        $this->amount = isset($data->Amount)? $data->Amount: null;
        $this->receivedDate = isset($data->ReceivedDate)? $data->ReceivedDate: null;
        $this->currency = isset($data->Currency)? $data->Currency: null;
        $this->country = isset($data->Country)? $data->Country: null;
        $this->returnCode = isset($data->ReturnCode)? $data->ReturnCode: null;
        $this->returnMessage = isset($data->ReturnMessage)? $data->ReturnMessage: null;
        $this->status = isset($data->Status)? $data->Status: null;

        $this->links = isset($data->Links)? $data->Links: [];
    }

    public static function fromJson($json)
    {
        $payment = new Payment();
        $payment->populate(json_decode($json));

        return $payment;
    }

    private function newCard($securityCode, $brand)
    {
        $card = new CreditCard();
        $card->setSecurityCode($securityCode);
        $card->setBrand($brand);

        return $card;
    }

    public function creditCard($securityCode, $brand)
    {
        $card = $this->newCard($securityCode, $brand);

        $this->setType(self::PAYMENTTYPE_CREDITCARD);
        $this->setCreditCard($card);

        return $card;
    }

    public function debitCard($securityCode, $brand)
    {
        $card = $this->newCard($securityCode, $brand);

        $this->setType(self::PAYMENTTYPE_DEBITCARD);
        $this->setDebitCard($card);

        return $card;
    }

    public function recurrentPayment($authorizeNow = true)
    {
        $recurrentPayment = new RecurrentPayment($authorizeNow);

        $this->setRecurrentPayment($recurrentPayment);

        return $recurrentPayment;
    }

    public function getServiceTaxAmount()
    {
        return $this->serviceTaxAmount;
    }

    public function setServiceTaxAmount($serviceTaxAmount)
    {
        $this->serviceTaxAmount = $serviceTaxAmount;
        return $this;
    }

    public function getInstallments()
    {
        return $this->installments;
    }

    public function setInstallments($installments)
    {
        $this->installments = $installments;
        return $this;
    }

    public function getInterest()
    {
        return $this->interest;
    }

    public function setInterest($interest)
    {
        $this->interest = $interest;
        return $this;
    }

    public function getCapture()
    {
        return $this->capture;
    }

    public function setCapture($capture)
    {
        $this->capture = $capture;
        return $this;
    }

    public function getAuthenticate()
    {
        return $this->authenticate;
    }

    public function setAuthenticate($authenticate)
    {
        $this->authenticate = $authenticate;
        return $this;
    }

    public function getRecurrent()
    {
        return $this->recurrent;
    }

    public function setRecurrent($recurrent)
    {
        $this->recurrent = $recurrent;
        return $this;
    }

    public function getRecurrentPayment()
    {
        return $this->recurrentPayment;
    }

    public function setRecurrentPayment($recurrentPayment)
    {
        $this->recurrentPayment = $recurrentPayment;
        return $this;
    }

    public function getCreditCard()
    {
        return $this->creditCard;
    }

    public function setCreditCard(CreditCard $creditCard)
    {
        $this->creditCard = $creditCard;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDebitCard()
    {
        return $this->debitCard;
    }

    /**
     * @param mixed $debitCard
     */
    public function setDebitCard($debitCard)
    {
        $this->debitCard = $debitCard;
        return $this;
    }

    public function getAuthenticationUrl()
    {
        return $this->authenticationUrl;
    }

    public function setAuthenticationUrl($authenticationUrl)
    {
        $this->authenticationUrl = $authenticationUrl;
        return $this;
    }

    public function getTid()
    {
        return $this->tid;
    }

    public function setTid($tid)
    {
        $this->tid = $tid;
        return $this;
    }

    public function getProofOfSale()
    {
        return $this->proofOfSale;
    }

    public function setProofOfSale($proofOfSale)
    {
        $this->proofOfSale = $proofOfSale;
        return $this;
    }

    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    public function getSoftDescriptor()
    {
        return $this->softDescriptor;
    }

    public function setSoftDescriptor($softDescriptor)
    {
        $this->softDescriptor = $softDescriptor;
        return $this;
    }

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
        return $this;
    }

    public function getProvider()
    {
        return $this->provider;
    }

    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    public function getPaymentId()
    {
        return $this->paymentId;
    }

    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    public function setReceivedDate($receivedDate)
    {
        $this->receivedDate = $receivedDate;
        return $this;
    }

    public function getCapturedAmount()
    {
        return $this->capturedAmount;
    }

    public function setCapturedAmount($capturedAmount)
    {
        $this->capturedAmount = $capturedAmount;
        return $this;
    }

    public function getCapturedDate()
    {
        return $this->capturedDate;
    }

    public function setCapturedDate($capturedDate)
    {
        $this->capturedDate = $capturedDate;
        return $this;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
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

    public function getReturnCode()
    {
        return $this->returnCode;
    }

    public function setReturnCode($returnCode)
    {
        $this->returnCode = $returnCode;
        return $this;
    }

    public function getReturnMessage()
    {
        return $this->returnMessage;
    }

    public function setReturnMessage($returnMessage)
    {
        $this->returnMessage = $returnMessage;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function setLinks($links)
    {
        $this->links = $links;
        return $this;
    }

    public function getExtraDataCollection()
    {
        return $this->extraDataCollection;
    }

    public function setExtraDataCollection($extraDataCollection)
    {
        $this->extraDataCollection = $extraDataCollection;
        return $this;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
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
            
    public function getBoletoNumber()
    {
        return $this->boletoNumber;
    }
    
    public function setBoletoNumber($boletoNumber)
    {
        $this->boletoNumber = $boletoNumber;
        return $this;
    }

    public function getBarCodeNumber()
    {
        return $this->barCodeNumber;
    }

    public function setBarCodeNumber($barCodeNumber)
    {
        $this->barCodeNumber = $barCodeNumber;
        return $this;
    }

    public function getDigitableLine()
    {
        return $this->digitableLine;
    }

    public function setDigitableLine($digitableLine)
    {
        $this->digitableLine = $digitableLine;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }
}
