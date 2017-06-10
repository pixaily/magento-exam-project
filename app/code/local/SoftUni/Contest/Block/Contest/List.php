<?php
/**
 * Created by PhpStorm.
 * User: Daniel Georgiev
 * Date: 10.6.2017 г.
 * Time: 18:19
 */

class SoftUni_Contest_Block_Contest_List extends Mage_Core_Block_Template
{
    public function getActionUrl()
    {
        return $this->getUrl('softuni-contest/contest/list');
    }
}