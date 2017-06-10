<?php

/**
 * Created by PhpStorm.
 * User: Daniel Georgiev
 * Date: 10.6.2017 г.
 * Time: 13:29
 */
class SoftUni_Contest_ContestantController extends Mage_Sales_Controller_Abstract
{
    protected function _getSession()
    {
        return Mage::getSingleton('customer/session');
    }

    public function addAction()
    {
        if(!$this->_getSession()->isLoggedIn()) {
            Mage::getSingleton('customer/session')->addError($this->__('Login is required'));
            $this->_redirect('customer/account');
            return;
        }
        $this->loadLayout();
        $this->renderLayout();

    }
}