<?php

/**
 * Created by PhpStorm.
 * User: Daniel Georgiev
 * Date: 10.6.2017 г.
 * Time: 13:29
 */

class SoftUni_Contest_ContestantController extends Mage_Core_Controller_Front_Action
{
    public function postAction()
    {
        $curTime = Varien_Date::now();
        $contestant = Mage::getModel('softuni_contest/contestant');

        $contestant->setContestId(Mage::app()->getRequest()->getPost('contestant-contest-id'));
        $contestant->setFirstname(Mage::app()->getRequest()->getPost('contestant-firstname'));
        $contestant->setLastname(Mage::app()->getRequest()->getPost('contestant-lastname'));
        $contestant->setDob(Mage::app()->getRequest()->getPost('contestant-dob'));
        $contestant->setCountry(Mage::app()->getRequest()->getPost('contestant-country'));
        $contestant->setCity(Mage::app()->getRequest()->getPost('contestant-city'));
        $contestant->setEmail(Mage::app()->getRequest()->getPost('contestant-email'));
        $contestant->setMessage(Mage::app()->getRequest()->getPost('contestant-message'));
        $contestant->setCreatedAt($curTime);
        $contestant->setUpdatedAt($curTime);

        $contestant->save();

        $this->_redirectReferer();
    }

    public function getActionUrl()
   {
        return $this->getUrl('softuni-contest/contestant/add');
        }
}