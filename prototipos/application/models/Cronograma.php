<?php

/**
 *
 */
class Cronograma
{
    protected $_fechaInicio;
    protected $_fechaCierre;

    public function __construct($fechaInicio, $fechaCierre)
    {
        if(strtotime($fechaInicio) == null || strtotime($fechaCierre) == null)
        {
            throw new Exception("Fecha inválida");
        }
        else
        {
            $this->_fechaInicio = $fechaInicio;
            $this->_fechaCierre = $fechaCierre;
        }
    }

    public function fechaInicio()
    {
        return $this->_fechaInicio;
    }

    public function fechaCierre()
    {
        return $this->_fechaCierre;
    }

}

