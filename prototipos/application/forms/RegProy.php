<?php

class Application_Form_RegProy extends Zend_Form
{

    public function init()
    {
        $this->registroProyecto();
    }

    protected function registroProyecto()
    {
        $this->setName('frmRegProy')
             ->setAttrib('class','frmClass');

        // Agregamos la acción
        // $this->setAction($this->view->url(array("controller" => "reg-proy", "action" => "ingresar-datos-basicos")))
        //      ->setMethod('post');

        // Agregamos los elementos
        $this->addElement('text','nombre',array('label'=>'Nombre','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));
        $this->addElement('textarea','descripcion',array('label'=>'Descripción','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));
        $this->addElement('submit','crear',array('label'=>'Crear'));
    }

}

