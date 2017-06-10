<?php

class SoftUni_Contest_Model_Resource_Contestant extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('softuni_contest/contestant', 'contestant_id');
    }
}