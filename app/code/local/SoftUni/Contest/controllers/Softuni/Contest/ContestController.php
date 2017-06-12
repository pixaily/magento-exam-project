<?php

class SoftUni_Contest_Softuni_Contest_ContestController extends Mage_Adminhtml_Controller_Action
{

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
        $this->_title($this->__('Softuni Contest'));

        $contestId = $this->getRequest()->getParam('contest_id');
        $model = Mage::getModel('softuni_contest/contest');

        if($contestId) {
            $model->load($contestId);

            if(!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('softuni_contest')->__('There is no such contest'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->_title($model->getId() ? $model->getTitle() : $this->__('New Contest'));

        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('softuni_contest_contest', $model);

        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
        // check if data sent
        if ($data = $this->getRequest()->getPost()) {

            $contestId = $this->getRequest()->getParam('contest_id');
            $model = Mage::getModel('softuni_contest/contest')->load($contestId);
            $curTime = Varien_Date::now();

            if (!$model->getId() && $contestId) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('softuni_contest')->__('This contest no longer exists.'));
                $this->_redirect('*/*/index');
                return;
            }

            // init model and set data
            $model->setData($data);

            if (!$model->getId()) {
                $model->setCreatedAt($curTime);
            }

            $model->setUpdatedAt($curTime);

            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('softuni_contest')->__('The contest has been saved.'));
                // clear previously saved data from session
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('contest_id' => $model->getId()));
                    return;
                }
                // go to grid
                $this->_redirect('*/*/index');
                return;

            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // save data in session
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                // redirect to edit form
                $this->_redirect('*/*/edit', array('contest_id' => $this->getRequest()->getParam('contest_id')));
                return;
            }
        }
        $this->_redirect('*/*/index');
    }

    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($contestId = $this->getRequest()->getParam('contest_id')) {

            try {
                // init model and delete
                $model = Mage::getModel('softuni_contest/contest');
                $model->load($contestId);
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('softuni_contest')->__('The contest has been deleted.'));
                // go to grid
                $this->_redirect('*/*/index');
                return;

            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // go back to edit form
                $this->_redirect('*/*/edit', array('contest_id' => $contestId));
                return;
            }
        }
        // display error message
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('softuni_contest')->__('Unable to find a contest to delete.'));
        // go to grid
        $this->_redirect('*/*/index');
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/softuni_contest_contest');
    }
}