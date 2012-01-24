<?php

class BuscarController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $this->view->headTitle("Buscar");
    }

    public function proyectoAction()
    {
        $this->view->headTitle("Buscar");
        $this->view->id = $this->_getParam('id', 0);
    }

    public function cronogramaAction()
    {
        $this->view->headTitle("Buscar");
        $this->view->id = $this->_getParam('id', 0);
    }

    public function compromisosAction()
    {
        $this->view->headTitle("Buscar");
        $this->view->id = $this->_getParam('id', 0);
    }

    public function hprorrogasAction()
    {
        $this->view->headTitle("Buscar");
        $this->view->id = $this->_getParam('id', 0);
    }

    public function prorrogaAction()
    {
        $this->view->headTitle("Buscar");
        $this->view->id = $this->_getParam('id', 0);
    }

    public function integranteAction()
    {
        $this->view->headTitle("Buscar");
        $this->view->id = $this->_getParam('id', 0);
    }

}

