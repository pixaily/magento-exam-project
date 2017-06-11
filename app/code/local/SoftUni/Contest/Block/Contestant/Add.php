<?php
/**
 * Created by PhpStorm.
 * User: Daniel Georgiev
 * Date: 10.6.2017 г.
 * Time: 12:56
 */

class SoftUni_Contest_Block_Contestant_Add
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{
    protected $contest = array();

    public function getContest()
    {
        $errorMsg = $this->__('There is no such active contest');
        $selectedContest = $this->getData('contest');

        if (empty($selectedContest)) {
            return $errorMsg;
        }

        $selectedContest = explode('-', $selectedContest);

        $this->contest['id'] = $selectedContest[0];
        $this->contest['title'] = $selectedContest[1];

        return $this->contest;
    }
//
//    private function _init()
//    {
//        $this->getContest();
//    }
//
//    public function getContestTitle() {
//        return $this->_contest['title'];
//    }
//
//    private function registerContestId() {
////        Mage::register('contestant_contest_id', $this->_contest['id']);
//    }
//
//    private function getContest() {
//        $errorMsg = $this->__('There is no such active contest');
//        $selectedContest = $this->getData('contest');
//
//        if (empty($selectedContest)) {
//            return $errorMsg;
//        }
//
//        $selectedContest = explode('-', $selectedContest);
//
//        $this->_contest['id'] = $selectedContest[0];
//        $this->_contest['title'] = $selectedContest[1];
//
//        $this->registerContestId();
////        Mage::register('contestant_contest_id', $this->_contest['id']);
//
////        var_dump(Mage::registry('contestant_contest_id'));
//    }

    public function getActionUrl()
    {
        return $this->getUrl('softuni-contest/contestant/post');
    }
}