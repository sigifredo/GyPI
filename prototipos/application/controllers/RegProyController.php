<?php

class RegProyController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->headTitle("Registro de proyecto");

        $form = new Application_Form_Registro();
        $form->proyecto();

        $p = new Proyecto();
        $p->agregarParticipante("");

        echo $form;
    }

    public function ingresarDatosBasicosAction()
    {
        if(!$this->getRequest()->isPost())
        {
            return;
        }

        $form=new Zend_Form;
        $form->setAttrib('class','ingresar');
        $form->setAction($this->view->url(array("controller" => "reg-proy", "action" => "guardar-proyecto")))
             ->setMethod('post');

        $values = $this->getRequest()->getParams();
        $form->addElement('hidden','proyecto',array('label'=>'Proyecto: '.$values['nombre'], 'value' => $values['nombre']));
        $form->addElement('hidden','descripcion',array('label'=>'Descripción: '.$values['descripcion'], 'value' => $values['descripcion']));

        // Integrante(s)
        $form->addElement('hidden','integrantes',array('label'=>'Integrantes'));
        $this->ingresarIntegrante($form);

        // Comprimoso(s)
        $form->addElement('hidden','compromisos',array('label'=>'Compromisos'));
        $this->ingresarCompromiso($form);

        $form->addElement('submit','guardar',array('label'=>'Guardar'));

        echo $form;
        
    }

    public function ingresarIntegrante($form)
    {
        $form->addElement('text','nombreintegrante',array('label'=>'Nombre','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));

        $form->addElement('text','documentointegrante',array('label'=>'Documento','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));

        $form->addElement('text','correointegrante',array('label'=>'Correo','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));
    }

    public function ingresarCompromiso($form)
    {
        $form->addElement('textarea','descripcioncompromiso',array('label'=>'Descripción del compromiso','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));
    }

    public function guardarProyectoAction()
    {
        if(!$this->getRequest()->isPost())
        {
            return;
        }

        $values = $this->getRequest()->getParams();


echo "<br>Se han guardado los datos correctamente:";
echo "<br><br>Proyecto: ".$values['proyecto'];
echo "<br>Descripción: ".$values['descripcion'];
echo "<br><br>Integrantes";
echo "<br>Nombre: ".$values['nombreintegrante'];
echo "<br>Documento: ".$values['documentointegrante'];
echo "<br>Correo: ".$values['correointegrante'];
echo "<br><br>Comprimisos:";
echo "<br>Descripción: ".$values['descripcioncompromiso'];
    }

}

