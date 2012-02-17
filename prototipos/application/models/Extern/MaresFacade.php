<?php

class Extern_MaresFacade
{

    public static function validarUsuario($sDocumento)
    {
        $vinculos = array(
                             1 => "Estudiante",
                             2 => "Profesor",
                             3 => "Investigador Asociado",
                             4 => null
                         );

        return $vinculos[rand(1, 4)];
    }

}

