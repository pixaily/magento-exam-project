<?php

class SoftUni_Contest_Block_Adminhtml_Contestant_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __contruct()
    {
        parent::__construct();
        $this->setId('softuni_contest_contestant_form');
        $this->setTitle(Mage::helper('softuni_contest')->__('Contestant Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('softuni_contest_contestant');

        $form = new Varien_Data_Form(array('id' => 'edit_form', 'action' => $this->getUrl('adminhtml/softuni_contest_contestant/save'), 'method' => 'post'));

        $form->setHtmlIdPrefix('softuni_contest_contestant_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('softuni_contest')->__('General Information'), 'class' => 'fieldset-wide'));

        if($model->getContestantId()) {
            $fieldset->addField('contestant_id', 'hidden', array(
                'name' => 'contestant_id'
            ));
        };

        $fieldset->addField('firstname', 'text', array(
            'name'  => 'firstname',
            'label' => Mage::helper('softuni_contest')->__('First name'),
            'title' => Mage::helper('softuni_contest')->__('First name'),
            'required' => true
        ));

        $fieldset->addField('lastname', 'text', array(
            'name'  => 'lastname',
            'label' => Mage::helper('softuni_contest')->__('Last name'),
            'title' => Mage::helper('softuni_contest')->__('Last name'),
            'required' => true
        ));

        $fieldset->addField('dob', 'text', array(
            'name'  => 'dob',
            'label' => Mage::helper('softuni_contest')->__('Date of birth'),
            'title' => Mage::helper('softuni_contest')->__('Date of birth'),
            'required' => true
        ));

        $fieldset->addField('country', 'text', array(
            'name'  => 'country',
            'label' => Mage::helper('softuni_contest')->__('Country'),
            'title' => Mage::helper('softuni_contest')->__('Country'),
            'required' => true
        ));

        $fieldset->addField('city', 'text', array(
            'name'  => 'city',
            'label' => Mage::helper('softuni_contest')->__('City'),
            'title' => Mage::helper('softuni_contest')->__('City'),
            'required' => true
        ));

        $fieldset->addField('email', 'text', array(
            'name'  => 'email',
            'label' => Mage::helper('softuni_contest')->__('Email'),
            'title' => Mage::helper('softuni_contest')->__('Email')
        ));

        $fieldset->addField('message', 'editor', array(
            'name'  => 'message',
            'label' => Mage::helper('softuni_contest')->__('Description'),
            'title' => Mage::helper('softuni_contest')->__('Description'),
            'required' => true
        ));

        $fieldset->addField('approved', 'select', array(
            'label'     => Mage::helper('softuni_contest')->__('Approved'),
            'title'     => Mage::helper('softuni_contest')->__('Approved'),
            'name'      => 'approved',
            'required'  => true,
            'options'   => array(
                '1' => Mage::helper('softuni_contest')->__('Approved'),
                '0' => Mage::helper('softuni_contest')->__('Not approve'),
            ),
        ));
        if (!$model->getId()) {
            $model->setData('approved', '0');
        }

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}

