<?php

class ResponderController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->headTitle("Responder solicitud");
    }

    public function solicitudAction()
    {
        $this->view->headTitle("Responder solicitud");
        $this->view->id = $this->_getParam('id', 0);
    }

    public function guardarAction()
    {
        $this->view->headTitle("Responder solicitud");
    }

}

