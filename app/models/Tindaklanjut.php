<?php

class Tindaklanjut extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idTindak;

    /**
     *
     * @var string
     */
    public $tema;

    /**
     *
     * @var string
     */
    public $tanggalRapat;

    /**
     *
     * @var string
     */
    public $hasilKesepatakanRapat;

    /**
     *
     * @var string
     */
    public $tanggalPenyelesaian;

    /**
     *
     * @var string
     */
    public $status;

    /**
     *
     * @var string
     */
    public $unit;

    /**
     *
     * @var string
     */
    public $syarat;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("project_2");
        $this->setSource("tindaklanjut");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tindaklanjut';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tindaklanjut[]|Tindaklanjut|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tindaklanjut|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
