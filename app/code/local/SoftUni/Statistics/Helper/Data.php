<?php

class SoftUni_Statistics_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isSoftuniStatisticsOrdersEnabled()
    {
        return Mage::getStoreConfigFlag('general/softuni_statistics_orders/statistics_orders_enabled');
    }
}