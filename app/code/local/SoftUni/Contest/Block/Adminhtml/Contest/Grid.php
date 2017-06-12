<?php

class SoftUni_Contest_Block_Adminhtml_Contest_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('softuniContestGrid');
        $this->setDefaultSort('contest_id');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('softuni_contest/contest')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('contest_id', array(
            'header'    => Mage::helper('softuni_contest')->__('ID'),
            'index'     => 'contest_id',
        ));

        $this->addColumn('title', array(
            'header'    => Mage::helper('softuni_contest')->__('Title'),
            'index'     => 'title'
        ));

        $this->addColumn('description', array(
            'header'    => Mage::helper('softuni_contest')->__('Description'),
            'index'     => 'description'
        ));

        $this->addColumn('is_active', array(
            'header'    => Mage::helper('softuni_contest')->__('Is Active'),
            'index'     => 'is_active',
            'type'      => 'options',
            'options'   => array(
                0 => Mage::helper('softuni_contest')->__('Disabled'),
                1 => Mage::helper('softuni_contest')->__('Enabled')
            ),
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
        return $this->getUrl('*/*/edit', array('contest_id' => $row->getId()));
    }
}