<?php

class Application_Form_Registro extends Zend_Form
{
    /**
     * \brief Variable booleana que indica si ya se creó el formulario.
     * Si el formulario ya fue creado esta variable tendrá el valor de verdadero, de lo contrario su valor será falso.
     */
    protected $_bForm = false;

    public function init()
    {
        $this->proyectoForm();
    }

    public function proyecto()
    {
        $values = $this->getValues();

        $pro = new Proyecto($values['nombre'], $values['descripcion']);

        // Manejar excepciones de participante invalido
        $part = new Participante($values['documentointegrante'], $values['nombreintegrante'], $values['correointegrante']);

        $pro->agregarParticipante($part);

        return $pro;
    }

    /**
     * Creamos el formulario para guardar un proyecto.
     */
    public function proyectoForm()
    {
        if($this->_bForm)
            $this->setName('frmRegistro')
                 ->setAttrib('class','frmClass');

        // Agregamos la acción
        // $this->setAction($this->view->url(array("controller" => "reg-proy", "action" => "ingresar-datos-basicos")))
        //      ->setMethod('post');

        // Agregamos los elementos
        $this->addElement('textarea','nombre', array('label'=>'Nombre *','required'=>true, 'rows' => '3', 'cols' => '80'));
        $this->addElement('textarea','descripcion',array('label'=>'Descripción *','required'=>true, 'rows' => '25', 'cols' => '80'));

        $this->integranteForm();

        $this->addElement('submit','crear',array('label'=>'Crear'));

        $this->_bForm = true;
    }

    public function integranteForm()
    {
        if($this->_bForm)
            $this->setName('frmRegistro')
                 ->setAttrib('class','frmClass');

        $this->addElement('hidden', 'integrantes', array('label' => 'Integrantes'));
        $this->addElement('text', 'nombreintegrante', array('label' => 'Nombre'));
        $this->addElement('text', 'documentointegrante', array('label' => 'Documento'));
        $this->addElement('text', 'correointegrante', array('label' => 'Correo'));
    }

}

