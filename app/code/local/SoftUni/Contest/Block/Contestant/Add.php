<?php
/**
 * Created by PhpStorm.
 * User: Daniel Georgiev
 * Date: 10.6.2017 г.
 * Time: 12:56
 */

class SoftUni_Contest_Block_Contestant_Add extends Mage_Core_Block_Template
{
    public function getActionUrl()
    {
        return $this->getUrl('softuni-contest/contestant/add');
    }
}