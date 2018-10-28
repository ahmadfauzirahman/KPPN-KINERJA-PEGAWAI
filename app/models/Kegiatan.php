<?php

class Kegiatan extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $kegiatanID;

    /**
     *
     * @var string
     */
    public $kegiatanWaktu;
    public $file;
    public $anggarandana;

    /**
     *
     * @var string
     */
    public $agendaKegiatan;

    /**
     *
     * @var string
     */
    public $tempat;

    /**
     *
     * @var string
     */
    public $pic;

    /**
     *
     * @var string
     */
    public $status;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("project_2");
        $this->setSource("kegiatan");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'kegiatan';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Kegiatan[]|Kegiatan|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Kegiatan|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
