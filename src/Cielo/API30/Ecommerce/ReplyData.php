<?php
namespace Cielo\API30\Ecommerce;

class ReplyData implements \JsonSerializable
{
    
    private $addAddressInfoCode;
    
    private $factorCode;
    
    private $score;
    
    private $binCountry;
    
    private $cardIssuer;
    
    private $cardScheme;
    
    private $hostSeverity;
    
    private $internetInfoCode;
    
    private $ipRoutingMethod;
    
    private $scoreModelUsed;
    
    private $casePriority;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->addAddressInfoCode = isset($data->AddAddressInfoCode) ? $data->AddAddressInfoCode : null;
        $this->factorCode = isset($data->FactorCode) ? $data->FactorCode : null;
        $this->score = isset($data->Score) ? $data->Score : null;
        $this->binCountry = isset($data->BinCountry) ? $data->BinCountry : null;
        $this->cardIssuer = isset($data->CardIssuer) ? $data->CardIssuer : null;
        $this->cardScheme = isset($data->CardScheme) ? $data->CardScheme : null;
        $this->hostSeverity = isset($data->HostSeverity) ? $data->HostSeverity : null;
        $this->internetInfoCode = isset($data->InternetInfoCode) ? $data->InternetInfoCode : null;
        $this->ipRoutingMethod = isset($data->IpRoutingMethod) ? $data->IpRoutingMethod : null;
        $this->scoreModelUsed = isset($data->ScoreModelUsed) ? $data->ScoreModelUsed : null;
        $this->casePriority = isset($data->CasePriority) ? $data->CasePriority : null;

    }
    
    public static function fromJson($json)
    {
        $replyData = new ReplyData();
        $replyData->populate(json_decode($json));

        return $replyData;
    }
    
    public function getFactorCodeMessages() 
    {
        $arrCodes = explode('^', $this->factorCode);
        $arrMessages = array();
        foreach ($arrCodes as $code) {
            switch ($code) {
                case 'A':
                    $arrMessages['A'] = 'Mudança de endereço excessiva. O cliente mudou o endereço de cobrança duas ou mais vezes nos últimos seis meses.';
                    break;
                case 'B':
                    $arrMessages['B'] = 'BIN do cartão ou autorização de risco. Os fatores de risco estão relacionados com BIN de cartão de crédito e/ou verificações de autorização do cartão.';
                    break;
                case 'C':
                    $arrMessages['C'] = 'Elevado números de cartões de créditos. O cliente tem usado mais de seis números de cartões de créditos nos últimos seis meses.';
                    break;
                case 'D':
                    $arrMessages['D'] = 'Impacto do endereço de e-mail. O cliente usa um provedor de e-mail gratuito ou o endereço de email é arriscado.';
                    break;
                case 'E':
                    $arrMessages['E'] = 'Lista positiva. O cliente está na sua lista positiva.';
                    break;
                case 'F':
                    $arrMessages['F'] = 'Lista positiva. O cliente está na sua lista positiva.';
                    break;
                case 'G':
                    $arrMessages['G'] = 'Inconsistências de geolocalização. O domínio do cliente de e-mail, número de telefone, endereço de cobrança, endereço de envio ou endereço IP é suspeito.';
                    break;
                case 'H':
                    $arrMessages['H'] = 'Excessivas mudanças de nome. O cliente mudou o nome duas ou mais vezes nos últimos seis meses.';
                    break;
                case 'I':
                    $arrMessages['I'] = 'Inconsistências de internet. O endereço IP e de domínio de e-mail não são consistentes com o endereço de cobrança.';
                    break;
                case 'N':
                    $arrMessages['N'] = 'Entrada sem sentido. O nome do cliente e os campos de endereço contém palavras sem sentido ou idioma.';
                    break;
                case 'O':
                    $arrMessages['O'] = 'Obscenidades. Dados do cliente contém palavras obscenas.';
                    break;
                case 'P':
                    $arrMessages['P'] = 'Identidade morphing. Vários valores de um elemento de identidade estão ligados a um valor de um elemento de identidade diferentes. Por exemplo, vários números de telefone estão ligados a um número de conta única.';
                    break;
                case 'Q':
                    $arrMessages['Q'] = 'Inconsistências do telefone. O número de telefone do cliente é suspeito.';
                    break;
                case 'R':
                    $arrMessages['R'] = 'Ordem arriscada. A transação, o cliente e o lojista mostram informações correlacionadas de alto risco.';
                    break;
                case 'T':
                    $arrMessages['T'] = 'Cobertura Time. O cliente está a tentar uma compra fora do horário esperado.';
                    break;
                case 'U':
                    $arrMessages['U'] = 'Endereço não verificável. O endereço de cobrança ou de entrega não pode ser verificado.';
                    break;
                case 'V':
                    $arrMessages['V'] = 'Velocity. O número da conta foi usado muitas vezes nos últimos 15 minutos.';
                    break;
                case 'W':
                    $arrMessages['W'] = 'Marcado como suspeito. O endereço de cobrança ou de entrega é semelhante a um endereço previamente marcado como suspeito.';
                    break;
                case 'Y':
                    $arrMessages['Y'] = 'O endereço, cidade, estado ou país dos endereços de cobrança e entrega não se correlacionam.';
                    break;
                case 'Z':
                    $arrMessages['Z'] = 'Valor inválido. Como a solicitação contém um valor inesperado, um valor padrão foi substituído. Embora a transação ainda possa ser processada, examinar o pedido com cuidado para detectar anomalias.';
                    break;
                default:
                    $arrMessages[] = 'Não encontramos nenhum código da Análise de Fraude.';
                    break;
            } 
        }
        
        return $arrMessages;
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
        return $this->addAddressInfoCode;
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
        $this->addAddressInfoCode = $type;
        return $this;
    }

    public function getAddAddressInfoCode() 
    {
        return $this->addAddressInfoCode;
    }

    public function getFactorCode()
    {
        return $this->factorCode;
    }

    public function getScore() 
    {
        return $this->score;
    }

    public function getBinCountry() 
    {
        return $this->binCountry;
    }

    public function getCardIssuer()
    {
        return $this->cardIssuer;
    }

    public function getCardScheme() {
        return $this->cardScheme;
    }

    public function getHostSeverity() 
    {
        return $this->hostSeverity;
    }

    public function getInternetInfoCode() 
    {
        return $this->internetInfoCode;
    }

    public function getIpRoutingMethod() 
    {
        return $this->ipRoutingMethod;
    }

    public function getScoreModelUsed()
    {
        return $this->scoreModelUsed;
    }

    public function getCasePriority() 
    {
        return $this->casePriority;
    }

    public function setAddAddressInfoCode($addAddressInfoCode) 
    {
        $this->addAddressInfoCode = $addAddressInfoCode;
        return $this;
    }

    public function setFactorCode($factorCode) 
    {
        $this->factorCode = $factorCode;
        return $this;
    }

    public function setScore($score) {
        $this->score = $score;
        return $this;
    }

    public function setBinCountry($binCountry) 
    {
        $this->binCountry = $binCountry;
        return $this;
    }

    public function setCardIssuer($cardIssuer)
    {
        $this->cardIssuer = $cardIssuer;
        return $this;
    }

    public function setCardScheme($cardScheme) 
    {
        $this->cardScheme = $cardScheme;
        return $this;
    }

    public function setHostSeverity($hostSeverity)
    {
        $this->hostSeverity = $hostSeverity;
        return $this;
    }

    public function setInternetInfoCode($internetInfoCode)
    {
        $this->internetInfoCode = $internetInfoCode;
        return $this;
    }

    public function setIpRoutingMethod($ipRoutingMethod)
    {
        $this->ipRoutingMethod = $ipRoutingMethod;
        return $this;
    }

    public function setScoreModelUsed($scoreModelUsed) 
    {
        $this->scoreModelUsed = $scoreModelUsed;
        return $this;
    }

    public function setCasePriority($casePriority) 
    {
        $this->casePriority = $casePriority;
        return $this;
    }

}