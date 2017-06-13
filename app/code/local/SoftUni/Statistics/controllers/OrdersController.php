<?php

class SoftUni_Statistics_OrdersController extends Mage_Core_Controller_Front_Action
{
    protected function _getSession()
    {
        return Mage::getSingleton('customer/session');
    }

    public function indexAction()
    {
        if(!$this->_getSession()->isLoggedIn()) {
            Mage::getSingleton('customer/session')->addError($this->__('Login is required'));
            $this->_redirect('customer/account');
            return false;
        } else if (!Mage::helper('softuni_statistics')->isSoftuniStatisticsOrdersEnabled()){
            Mage::getSingleton('customer/session')->addError($this->__('This option is unavailable at the moment'));
            $this->_redirect('customer/account');
            return false;
        }

        $this->loadLayout();
        $this->renderLayout();
    }
}