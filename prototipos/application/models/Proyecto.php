<?php

/**
 *
 */
class Proyecto
{
    protected $_sNombre;
    protected $_sDescripcion;
    protected $_aParticipantes;
    protected $_aCompromisos;
    protected $_cronograma;

    public function __construct($sNombre, $sDescripcion)
    {
        $this->_sNombre = $sNombre;
        $this->_sDescripcion = $sDescripcion;

        $this->_aParticipantes = array();
        $this->_aCompromisos = array();
    }

    public function nombre()
    {
        return $this->_sNombre;
    }

    public function descripcion()
    {
        return $this->_sDescripcion;
    }

    public function participantes()
    {
        return $this->_aParticipantes;
    }

    public function agregarParticipante($participante)
    {
        // if(gettype($participante) == gettype(Participante))
        // {
            $this->_aParticipantes[] = $participante;
        // }
        // else
        //     throw new Exception("Parámetro invalido");
    }

    public function agregarCompromiso($compromiso)
    {
        $this->_acompromisos[] = $compromiso;
    }

    public function agregarCronograma($cronograma)
    {
        $this->cronograma = $cronograma;
    }

    public function guardarProyecto()
    {
    }

}

