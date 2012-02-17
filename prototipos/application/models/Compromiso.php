<?php

/**
 *
 */
class Compromiso
{
    protected $_sDescripcion;

    public function __construct($sDescripcion)
    {
        $this->_sDescripcion = $sDescripcion;
    }

    public function descripcion()
    {
        return $this->_sDescripcion;
    }
}

