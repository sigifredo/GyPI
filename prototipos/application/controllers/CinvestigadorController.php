<?php

class CinvestigadorController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->headTitle("Cambio de investigador");

        $form = new Application_Form_CInvestigador();

        echo $form;
    }

    public function guardarAction()
    {
        $this->view->headTitle("Cambio de investigador");
    }


}

