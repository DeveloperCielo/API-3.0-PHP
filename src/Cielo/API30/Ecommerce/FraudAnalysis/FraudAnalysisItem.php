<?php

namespace Cielo\API30\Ecommerce\FraudAnalysis;

use Cielo\API30\Ecommerce\CieloSerializable;

/**
 * Class FraudAnalysisItem
 *
 * @package Cielo\API30\Ecommerce\FraudAnalysis
 */
class FraudAnalysisItem implements CieloSerializable
{

    /** @var string|null Campo que avaliará os endereços de cobrança e entrega para diferentes cidades, estados ou países.
     * “Yes”(Em caso de divergência entre endereços de cobrança e entrega, marca como risco pequeno)
     * “No”(Em caso de divergência entre endereços de cobrança e entrega, marca com risco alto)
     * “Off”(Ignora a análise de risco para endereços divergentes)
     * */
    private $giftCategory;

    /** @var string|null Nível de importância do e-mail e endereços IP dos clientes em risco de pontuação.
     * “Low”(Baixa importância do e-mail e endereço IP na análise de risco)
     * “Normal”(Média importância do e-mail e endereço IP na análise de risco)
     * “High”(Alta importância do e-mail e endereço IP na análise de risco)
     * “Off”(E-mail e endereço IP não afetam a análise de risco) 
     * */
    private $hostHedge;

    /** @var string|null Nível dos testes realizados sobre os dados do comprador com pedidos recebidos sem sentido.
     * “Low”(Baixa importância da verificação feita sobre o pedido do comprador, na análise de risco)
     * “Normal”(Média importância da verificação feita sobre o pedido do comprador, na análise de risco)
     * “High”(Alta importância da verificação feita sobre o pedido do comprador, na análise de risco)
     * “Off”(Verificação do pedido do comprador não afeta a análise de risco) 
     * */
    private $nonSensicalHedge;

    /** @var string|null Nível de obscenidade dos pedidos recebedidos.
     * “Low”(Baixa importância da verificação sobre obscenidades do pedido do comprador, na análise de risco)
     * “Normal”(Média importância da verificação sobre obscenidades do pedido do comprador, na análise de risco)
     * “High”(Alta importância da verificação sobre obscenidades do pedido do comprador, na análise de risco)
     * “Off”(Verificação de obscenidade no pedido do comprador não afeta a análise de risco) 
     * */
    private $obscenitiesHedge;

    /** @var string|null Nível dos testes realizados com os números de telefones.
     * “Low”(Baixa importância nos testes realizados com números de telefone)
     * “Normal”(Média importância nos testes realizados com números de telefone)
     * “High”(Alta importância nos testes realizados com números de telefone)
     * “Off”(Testes de números de telefone não afetam a análise de risco) 
     * */
    private $phoneHedge;

    /** @var string Nome do Produto. */
    private $name;

    /** @var integer Quantidade do produto a ser adquirido. */
    private $quantity;

    /** @var string Código comerciante identificador do produto. */
    private $sku;

    /** @var integer Preço unitário do produto. */
    private $unitPrice;

    /** @var string|null Nível do risco do produto.
     * Low (O produto tem um histórico de poucos chargebacks)
     * Normal (O produto tem um histórico de chargebacks considerado normal)
     * High (O produto tem um histórico de chargebacks acima da média) 
     * */
    private $risk;

    /** @var string|null Nível de importância da hora do dia do pedido do cliente.
     * Low (Baixa importância no horário do dia em que foi feita a compra, para a análise de risco)
     * Normal (Média importância no horário do dia em que foi feita a compra, para a análise de risco)
     * High (Alta importância no horário do dia em que foi feita a compra, para a análise de risco)
     * Off (O horário da compra não afeta a análise de risco) 
     * */
    private $timeHedge;

    /** @var string|null Tipo do produto.
     * AdultContent(Conteúdo adulto)
     * Coupon(Cupon de desconto)
     * Default(Opção padrão para análise na CyberSource quando nenhum outro valor é selecionado)
     * EletronicGood(Produto eletrônico)
     * EletronicSoftware(Softwares distribuídos eletronicamente via download)
     * GiftCertificate(Vale presente)
     * HandlingOnly(Taxa de instalação ou manuseio)
     * Service(Serviço)
     * ShippingAndHandling(Frete e taxa de instalação ou manuseio)
     * ShippingOnly(Frete)
     * Subscription(Assinatura) 
     * */
    private $type;

    /** @var string|null Nível de importância de frequência de compra do cliente.
     * Low (Baixa importância no número de compras realizadas pelo cliente nos últimos 15 minutos)
     * Normal (Média importância no número de compras realizadas pelo cliente nos últimos 15 minutos)
     * High (Alta importância no número de compras realizadas pelo cliente nos últimos 15 minutos)
     * Off (A frequência de compras realizadas pelo cliente não afeta a análise de fraude) 
     * */
    private $velocityHedge;

    /** @var FraudAnalysisPassenger|null */
    private $passenger;


    /**
     * FraudAnalysisItem constructor.
     *
     */
    public function __construct($name=null,
                                $quantity=null,
                                $sku=null,
                                $unitPrice=null,
                                $giftCategory=null,
                                $hostHedge=null,
                                $nonSensicalHedge=null,
                                $obscenitiesHedge=null,
                                $phoneHedge=null,
                                $risk=null,
                                $timeHedge=null,
                                $type=null,
                                $velocityHedge=null,
                                $passenger=null)
    {
        $this->giftCategory = $giftCategory;
        $this->hostHedge = $hostHedge;
        $this->nonSensicalHedge = $nonSensicalHedge;
        $this->obscenitiesHedge = $obscenitiesHedge;
        $this->phoneHedge = $phoneHedge;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->sku = $sku;
        $this->unitPrice = $unitPrice;
        $this->risk = $risk;
        $this->timeHedge = $timeHedge;
        $this->type = $type;
        $this->velocityHedge = $velocityHedge;
        $this->passenger = $passenger;
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
        $this->giftCategory = isset($data->GiftCategory) ? $data->GiftCategory : null;
        $this->hostHedge = isset($data->HostHedge) ? $data->HostHedge : null;
        $this->nonSensicalHedge = isset($data->NonSensicalHedge) ? $data->NonSensicalHedge : null;
        $this->obscenitiesHedge = isset($data->ObscenitiesHedge) ? $data->ObscenitiesHedge : null;
        $this->phoneHedge = isset($data->PhoneHedge) ? $data->PhoneHedge : null;
        $this->name = isset($data->Name) ? $data->Name : null;
        $this->quantity = isset($data->Quantity) ? $data->Quantity : null;
        $this->sku = isset($data->Sku) ? $data->Sku : null;
        $this->unitPrice = isset($data->UnitPrice) ? $data->UnitPrice : null;
        $this->risk = isset($data->Risk) ? $data->Risk : null;
        $this->timeHedge = isset($data->TimeHedge) ? $data->TimeHedge : null;
        $this->type = isset($data->Type) ? $data->Type : null;
        $this->velocityHedge = isset($data->VelocityHedge) ? $data->VelocityHedge : null;

        if (isset($data->Passenger)) {
            $this->passenger = new FraudAnalysisPassenger();
            $this->passenger->populate($data->Passenger);
        }
    }

    /**
     * @return mixed
     */
    public function getGiftCategory(){
        return $this->giftCategory;
    }
    /**
     * @param $giftCategory
     *
     * @return $this
     */
    public function setGiftCategory($giftCategory)
    {
        $this->giftCategory = $giftCategory;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getHostHedge(){
        return $this->hostHedge;
    }
    /**
     * @param $hostHedge
     *
     * @return $this
     */
    public function setHostHedge($hostHedge)
    {
        $this->hostHedge = $hostHedge;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getNonSensicalHedge(){
        return $this->nonSensicalHedge;
    }
    /**
     * @param $nonSensicalHedge
     *
     * @return $this
     */
    public function setNonSensicalHedge($nonSensicalHedge)
    {
        $this->nonSensicalHedge = $nonSensicalHedge;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getObscenitiesHedge(){
        return $this->obscenitiesHedge;
    }
    /**
     * @param $obscenitiesHedge
     *
     * @return $this
     */
    public function setObscenitiesHedge($obscenitiesHedge)
    {
        $this->obscenitiesHedge = $obscenitiesHedge;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getPhoneHedge(){
        return $this->phoneHedge;
    }
    /**
     * @param $phoneHedge
     *
     * @return $this
     */
    public function setPhoneHedge($phoneHedge)
    {
        $this->phoneHedge = $phoneHedge;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }
    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getQuantity(){
        return $this->quantity;
    }
    /**
     * @param $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSku(){
        return $this->sku;
    }
    /**
     * @param $sku
     *
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice(){
        return $this->unitPrice;
    }
    /**
     * @param $unitPrice
     *
     * @return $this
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRisk(){
        return $this->risk;
    }
    /**
     * @param $risk
     *
     * @return $this
     */
    public function setRisk($risk)
    {
        $this->risk = $risk;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeHedge(){
        return $this->timeHedge;
    }
    /**
     * @param $timeHedge
     *
     * @return $this
     */
    public function setTimeHedge($timeHedge)
    {
        $this->timeHedge = $timeHedge;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType(){
        return $this->type;
    }
    /**
     * @param $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVelocityHedge(){
        return $this->velocityHedge;
    }
    /**
     * @param $velocityHedge
     *
     * @return $this
     */
    public function setVelocityHedge($velocityHedge)
    {
        $this->velocityHedge = $velocityHedge;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassenger(){
        return $this->passenger;
    }
    /**
     * @param $passenger
     *
     * @return $this
     */
    public function setPassenger($passenger)
    {
        $this->passenger = $passenger;

        return $this;
    }

}
