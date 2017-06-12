<?php
/**
 * Created by PhpStorm.
 * User: Daniel Georgiev
 * Date: 10.6.2017 г.
 * Time: 18:19
 */

class SoftUni_Contest_Block_Contest_List extends Mage_Core_Block_Template
{
    protected $id;

    public function _construct()
    {
        $this->id = $this->getRequest()->getParam('id');
    }

    public function getContest()
    {
        // To try with $model->load($this->id)
        $contestCollection = Mage::getModel('softuni_contest/contest')->getCollection();

        $contestCollection->addFieldToSelect(array('contest_id', 'title', 'description', 'is_active'));
        $contestCollection->addFieldToFilter('contest_id', array(
            'qe' => $this->id
        ));
        $contestCollection->addFieldToFilter('is_active', array(
            'eq' => '1'
        ));

        $contestArr = array();

        foreach($contestCollection as $value) {
            $contestArr['title']        = $value->getTitle();
            $contestArr['description']  = $value->getDescription();
        }

        if(empty($contestArr)) {
            header("Location: /404" );
            exit;
        } else {
            return $contestArr;
        }

    }

    public function getContestant()
    {
        $contestantCollection = Mage::getModel('softuni_contest/contestant')->getCollection();

        $contestantCollection->addFieldToSelect(array('contest_id', 'firstname', 'lastname', 'country', 'city', 'approved'));
        $contestantCollection->addFieldToFilter('contest_id', array(
            'qe' => $this->id
        ));
        $contestantCollection->addFieldToFilter('approved', array(
            'qe' => '1'
        ));
        $contestantCollection->setOrder('firstname', 'ASC');

        $contestantArr = array();

        foreach($contestantCollection as $value) {
            array_push($contestantArr, array(
                'firstname' => $value->getFirstname(),
                'lastname'  => str_split($value->getLastname(), 1)[0],
                'country'   => Mage::getModel('directory/country')->loadByCode($value->getCountry())->getName(),
                'city'      => $value->getCity(),
                )
            );
        }

        return $contestantArr;
    }
}