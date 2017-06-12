<?php

class SoftUni_Contest_Softuni_Contest_ContestantController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/softuni_contest_contestant');
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $this->_title($this->__('Softuni Contestant'));

        $contestId = $this->getRequest()->getParam('contest_id');
        $model = Mage::getModel('softuni_contest/contest');

        if($contestId) {
            $model->load($contestId);
        }
    }
}