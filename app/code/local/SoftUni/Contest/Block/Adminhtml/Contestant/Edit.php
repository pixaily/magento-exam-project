<?php

class SoftUni_Contest_Block_Adminhtml_Contestant_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'contest_id';
        $this->_blockGroup = 'softuni_contest';
        $this->_controller = 'adminhtml_contestant';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('softuni_contest')->__('Save Contestant'));
        $this->_updateButton('delete', 'label', Mage::helper('softuni_contest')->__('Delete Contestant'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('softuni_contest')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save'
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('block_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'block_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'block_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if(Mage::registry('softuni_contest_contestant')->getId()) {
            return Mage::helper('softuni_contest')->__("Edit Contestant '%s'", $this->escapeHtml(Mage::registry('softuni_contest_contestant')->getTitle()));
        } else {
            return Mage::helper('softuni_contest')->__('New Contestant');
        }
    }
}