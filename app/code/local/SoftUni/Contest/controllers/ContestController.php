<?php
/**
 * Created by PhpStorm.
 * User: Daniel Georgiev
 * Date: 10.6.2017 г.
 * Time: 18:37
 */

class SoftUni_Contest_ContestController extends Mage_Sales_Controller_Abstract
{
    protected function _getSession()
    {
        return Mage::getSingleton('customer/session');
    }

    public function listAction()
    {
        if(!$this->_getSession()->isLoggedIn()) {
            Mage::getSingleton('customer/session')->addError($this->__('Login is required'));
            $this->_redirect('customer/account');
            return;
        }
        $this->loadLayout();
        $this->renderLayout();

        $data = Mage::getModel('softuni_contest/contest');

        die();
    }

}