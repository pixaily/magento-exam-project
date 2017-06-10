<?php

class SoftUni_Contest_Model_Resource_Contest_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('softuni_contest/contest');
    }
}