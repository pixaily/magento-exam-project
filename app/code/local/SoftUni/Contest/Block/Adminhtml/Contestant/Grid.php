<?php

class SoftUni_Contest_Block_Adminhtml_Contestant_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('softuniContestantGrid');
        $this->setDefaultSort('contestant_id');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('softuni_contest/contestant')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('contestant_id', array(
            'header'    => Mage::helper('softuni_contest')->__('ID'),
            'index'     => 'contestant_id',
        ));

        $this->addColumn('contest_id', array(
            'header'    => Mage::helper('softuni_contest')->__('ID'),
            'index'     => 'contest_id',
        ));

        $this->addColumn('firstname', array(
            'header'    => Mage::helper('softuni_contest')->__('First name'),
            'index'     => 'firstname'
        ));

        $this->addColumn('lastname', array(
            'header'    => Mage::helper('softuni_contest')->__('Last name'),
            'index'     => 'lastname'
        ));

        $this->addColumn('approved', array(
            'header'    => Mage::helper('softuni_contest')->__('Approved'),
            'index'     => 'approved',
            'type'      => 'options',
            'options'   => array(
                0 => Mage::helper('softuni_contest')->__('Not approved'),
                1 => Mage::helper('softuni_contest')->__('Approved')
            ),
        ));

        $this->addColumn('dob', array(
            'header'    => Mage::helper('softuni_contest')->__('Date of birth'),
            'index'     => 'dob'
        ));

        // Should fix country
        $this->addColumn('country', array(
            'header'    => Mage::helper('softuni_contest')->__('Country'),
            'index'     => 'country'
        ));

        $this->addColumn('city', array(
            'header'    => Mage::helper('softuni_contest')->__('City'),
            'index'     => 'city'
        ));

        $this->addColumn('email', array(
            'header'    => Mage::helper('softuni_contest')->__('Email'),
            'index'     => 'email'
        ));

        $this->addColumn('message', array(
            'header'    => Mage::helper('softuni_contest')->__('Message'),
            'index'     => 'message'
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('softuni_contest')->__('Created at'),
            'index'     => 'created_at'
        ));

        $this->addColumn('updated_at', array(
            'header'    => Mage::helper('softuni_contest')->__('Updated at'),
            'index'     => 'updated_at'
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('contestant_id' => $row->getId()));
    }
}
