<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class ExternalAuthentication
 *
 * @package Cielo\API30\Ecommerce
 */
class ExternalAuthentication implements \JsonSerializable, CieloSerializable
{

    private $cavv;
    private $xid;
    private $eci;
    private $version;
    private $referenceId;

    /** @var \stdClass $links */
    private $links;

    /**
     * @param string $json
     *
     * @return ExternalAuthentication
     */
    public static function fromJson($json)
    {
        $object    = \json_decode($json);
        $auth = new ExternalAuthentication();
        $auth->populate($object);

        return $auth;
    }

    /**
     * @inheritdoc
     */
    public function populate(\stdClass $data)
    {
        $this->cavv         = isset($data->Cavv) ? $data->Cavv : null;
        $this->xid          = isset($data->Xid) ? $data->Xid : null;
        $this->eci          = isset($data->Eci) ? $data->Eci : null;
        $this->version      = isset($data->Version) ? $data->Version : null;
        $this->referenceId  = isset($data->ReferenceId) ? $data->ReferenceId : null;
        $this->links        = isset($data->Links) ? $data->Links : new \stdClass();
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
    public function getCavv()
    {
        return $this->cavv;
    }

    /**
     * @param $cavv
     *
     * @return $this
     */
    public function setCavv($cavv)
    {
        $this->cavv = $cavv;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getXid()
    {
        return $this->xid;
    }

    /**
     * @param $xid
     *
     * @return $this
     */
    public function setXid($xid)
    {
        $this->xid = $xid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEci()
    {
        return $this->eci;
    }

    /**
     * @param $eci
     *
     * @return $this
     */
    public function setEci($eci)
    {
        $this->eci = $eci;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * @param $referenceId
     *
     * @return $this
     */
    public function setReferenceId($referenceId)
    {
        $this->referenceId = $referenceId;

        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param \stdClass $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }
}
