<?php

class SoftUni_Contest_Model_Adminhtml_Widget_Options
{
    public function toOptionArray()
    {
        $collection = $this->getContestsCollection();

        $arr = array(
            array(
                'value'  => '',
                'label' => Mage::helper('softuni_contest')->__('Select contest')
            )
        );

        foreach($collection as $value) {
            array_push($arr,array(
                'value'  => '' . $value->getContestId() . '-' . $value->getTitle(),
                'label' => Mage::helper('softuni_contest')->__($value->getTitle())
            ));
        }

        return $arr;
    }

    private function getContestsCollection() {
        $contestsCollection = Mage::getModel('softuni_contest/contest')->getCollection();

        $contestsCollection->addFieldToSelect(array('title', 'contest_id'));

        $contestsCollection->addFieldToFilter('is_active', array(
            'eq' => 1
        ));

        $contestsCollection->setOrder('title', 'ASC');

        return $contestsCollection;
    }

}