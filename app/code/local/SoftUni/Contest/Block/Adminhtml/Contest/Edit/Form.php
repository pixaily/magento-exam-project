<?php

class SoftUni_Contest_Block_Adminhtml_Contest_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __contruct()
    {
        parent::__construct();
        $this->setId('softuni_contest_contest_form');
        $this->setTitle(Mage::helper('softuni_contest')->__('Contest Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('softuni_contest_contest');

        $form = new Varien_Data_Form(array('id' => 'edit_form', 'action' => $this->getUrl('adminhtml/softuni_contest_contest/save'), 'method' => 'post'));

        $form->setHtmlIdPrefix('softuni_contest_contest_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('softuni_contest')->__('General Information'), 'class' => 'fieldset-wide'));

        if($model->getContestId()) {
            $fieldset->addField('contest_id', 'hidden', array(
                'name' => 'contest_id'
            ));
        };

        $fieldset->addField('title', 'text', array(
            'name'  => 'title',
            'label' => Mage::helper('softuni_contest')->__('Title'),
            'title' => Mage::helper('softuni_contest')->__('Title'),
            'required' => true
        ));

        $fieldset->addField('description', 'editor', array(
            'name'  => 'description',
            'label' => Mage::helper('softuni_contest')->__('Description'),
            'title' => Mage::helper('softuni_contest')->__('Description')
        ));

        $fieldset->addField('is_active', 'select', array(
            'label'     => Mage::helper('softuni_contest')->__('Is Active'),
            'title'     => Mage::helper('softuni_contest')->__('Is Active'),
            'name'      => 'is_active',
            'required'  => true,
            'options'   => array(
                '1' => Mage::helper('softuni_contest')->__('Enabled'),
                '0' => Mage::helper('softuni_contest')->__('Disabled'),
            ),
        ));
        if (!$model->getId()) {
            $model->setData('is_active', '1');
        }

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}