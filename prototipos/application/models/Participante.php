<?php

class Participante
{
    protected $_sDocumento;
    protected $_sNombre;
    protected $_sCorreo;
    protected $_sVinculo;

    public function __construct($sDocumento, $sNombre, $sCorreo = '')
    {
        $this->_sVinculo = Extern_MaresFacade::validarUsuario($sDocumento);

        if($this->_sVinculo == null)
        {
            throw new Exception("El usuario \"$sDocumento\" es inválido");
        }

        $this->_sDocumento = $sDocumento;
        $this->_sNombre = $sNombre;
        $this->_sCorreo = $sCorreo;
    }

    public function nombre()
    {
        return $this->_sNombre;
    }

    public function documento()
    {
        return $this->_sDocumento;
    }

    public function correo()
    {
        return $this->_sCorreo;
    }

}

