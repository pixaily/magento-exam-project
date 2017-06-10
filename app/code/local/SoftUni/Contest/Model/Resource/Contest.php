<?php

class SoftUni_Contest_Model_Resource_Contest extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('softuni_contest/contest', 'contest_id');
    }
}