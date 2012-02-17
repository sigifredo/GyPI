<?php

class RegProyController extends Zend_Controller_Action
{
protected $form;

    public function init()
    {
    }

    public function indexAction()
    {
        $this->view->headTitle("Registro de proyecto");

        $form = new Application_Form_Registro();

        $form->setAction($this->view->url(array("controller" => "reg-proy", "action" => "guardar-proyecto")))
              ->setMethod('post');

        echo $form;
    }

    public function ingresarCompromiso($form)
    {
        $form->addElement('textarea','descripcioncompromiso',array('label'=>'Descripción del compromiso','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));
    }

    public function guardarProyectoAction()
    {
        $form = new Application_Form_Registro();

        if(!$this->getRequest()->isPost())
        {
            echo $form;

            return;
        }

        if(!$form->isValid($this->_getAllParams()))
        {
            echo $form;

            return;
        }

       $p = $form->proyecto();

       echo "<br>Se han guardado los datos correctamente:";
       echo "<br><br>Proyecto: ".$p->nombre();
       echo "<br>Descripción: ".$p->descripcion();
       echo "<br><br>Integrantes";

       $prt = $p->participantes();

       foreach($prt as $i)
       {
           echo "<br>Nombre: ".$i->nombre();
           echo "<br>Documento: ".$i->documento();
           echo "<br>Correo: ".$i->correo();
       }
       // echo "<br><br>Comprimisos:";
       // echo "<br>Descripción: ".$values['descripcioncompromiso'];
    }

}

