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
        $form->setAction($this->view->url(array("controller" => "reg-proy", "action" => "ingresar-datos-basicos")))
        ->setMethod('post');

        $form->addElement('text','nombre',array('label'=>'Nombre','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));

        $form->addElement('textarea','descripcion',array('label'=>'Descripción','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));

        $form->addElement('submit','crear',array('label'=>'Crear'));

        echo $form;
    }

    public function ingresarDatosBasicosAction()
    {
        if(!$this->getRequest()->isPost())
        {
            echo "<h4 id='infnews'>Datos de noticia</h4>";
            echo $form;
            return;
        }

        $form=new Zend_Form;
        $form->setAttrib('class','ingresar');
        $form->setAction($this->view->url(array("controller" => "reg-proy", "action" => "guardar-proyecto")))
             ->setMethod('post');

        $values = $this->getRequest()->getParams();
        $form->addElement('hidden','proyecto',array('label'=>'Proyecto: '.$values['nombre']));
        $form->addElement('hidden','descripcion',array('label'=>'Descripción: '.$values['descripcion']));

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
        $form->addElement('text','nombre-integrante',array('label'=>'Nombre','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));

        $form->addElement('text','documento-integrante',array('label'=>'Documento','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));

        $form->addElement('text','correo-integrante',array('label'=>'Correo','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));
    }

    public function ingresarCompromiso($form)
    {
        $form->addElement('text','descripcion-compromiso',array('label'=>'Correo del integrante','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));
        $form->addElement('textarea','descripcion-compromiso',array('label'=>'Descripción del compromiso','required'=>true,'filter'=>'StringToLower','validator'=>'alfa','validator'=>'StringLength',false,array(4,25)));
    }

}

