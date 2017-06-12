<?php

class SoftUni_Contest_Block_Adminhtml_Contestant extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'softuni_contest';
        $this->_controller = 'adminhtml_contestant';
        $this->_headerText = Mage::helper('softuni_contest')->__('Manage Contestants');
        $this->_addButtonLabel = Mage::helper('softuni_contest')->__('Add new contestants');

        parent::__construct();
    }
}