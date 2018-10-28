<?php

class Rapat extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $rapatID;

    /**
     *
     * @var string
     */
    public $rapatNama;
    public $file;

    /**
     *
     * @var string
     */
    public $rapatTanggal;

    /**
     *
     * @var string
     */
    public $rapatTema;

    /**
     *
     * @var string
     */
    public $statusRapat;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("project_2");
        $this->setSource("rapat");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'rapat';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Rapat[]|Rapat|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Rapat|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
