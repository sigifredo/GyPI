<?php

class Application_Form_CInvestigador extends Zend_Form
{

    public function init()
    {
        $this->setName('frmCInvestigador')
            ->setAttrib('class', 'frmClass');

        // Agregamos los elementos
        $this->addElement('text', 'proyecto', array('label' => 'Proyecto:'));
        $this->addElement('text', 'responsable', array('label' => 'Responsable:'));
        $this->addElement('textarea', 'justificacion', array('label' => 'Justificación:', 'rows' => '10', 'cols' => '50'));
        $this->addElement('textarea', 'perfil', array('label' => 'Perfil del nuevo investigador:', 'rows' => '10', 'cols' => '50'));
        $this->addElement('file', 'archivo', array('label' => 'Adjuntar archivo:'));
        $this->addElement('submit', 'Guardar');
        $this->addElement('reset', 'Restaurar');
    }

}

