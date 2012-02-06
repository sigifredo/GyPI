<?php

class RegProyController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->nuevoProyecto();
    }

    public function nuevoProyecto()
    {
        $form=new Zend_Form;
        $form->setAttrib('class','regproy');
        $form->setAction($this->view->url(array("controller" => "reg-proy", "action" => "guardar-datos-basicos")))
        ->setMethod('post');

        $form->addElement('text','nombre',array('label'=>'Nombre','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));

        $form->addElement('textarea','descripcion',array('label'=>'Descripción','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));

        $form->addElement('submit','crear',array('label'=>'Crear'));

        echo $form;
    }

    public function ingresarDatosBasicosAction()
    {
        // action body
    }


}


