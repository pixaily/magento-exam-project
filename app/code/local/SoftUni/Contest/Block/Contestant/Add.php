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
    private function getContestId() {
        $selectedContestId = $this->getRequest()->getParam('contest_id');

        if(!$selectedContestId) {
            $selectedContestId = $this->getData('contest');

            if(!$selectedContestId) {
                return false;
            }
        }

        return $selectedContestId;
    }

    public function getContest()
    {
        $errorMsg = $this->__('There is no such active contest');
        $contestModel = Mage::getModel('softuni_contest/contest');
        $selectedContestId = $this->getContestId();

        if(!$selectedContestId) {
            return $errorMsg;
        }

        $contest = $contestModel->load($selectedContestId);

        if (empty($contest->getTitle()) && !$contest->getIsActive()) {
            return $errorMsg;
        }

        return $contest;
    }

    public function getActionUrl()
    {
        return $this->getUrl('softuni-contest/contestant/post');
    }
}