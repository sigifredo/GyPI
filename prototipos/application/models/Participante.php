<?php

class Participante
{
    protected $_sDocumento;
    protected $_sNombre;
    protected $_sCorreo;
    protected $_sVinculo;

    public function __construct($sDocumento, $sNombre, $sCorreo = '')
    {
        $this->_sVinculo = Extern_MaresFacade::validarUsuario();

        if($this->_sVinculo == null)
        {
            throw new Exception("El usuario \"$sDocumento\" es invalido");
        }
    }

    public function nombre()
    {
        return $this->_sNombre;
    }

}

