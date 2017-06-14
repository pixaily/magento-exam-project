<?php

class SoftUni_Statistics_Block_Orders extends Mage_Core_Block_Template
{
    protected function getOrders()
    {
        $ordersCollection = Mage::getModel('sales/order')->getCollection();

        return $ordersCollection;
    }

    public function countAllCompletedOrders()
    {
        $collection = $this->getOrders();

        $collection->addAttributeToFilter('status', array(
            'eq' => 'complete'
        ));

        return sizeof($collection);
    }

    public function countAllNotCompletedOrders()
    {
        $collection = $this->getOrders();

        $collection->addAttributeToFilter('status', array(
            'neq' => 'complete'
        ));
        return sizeof($collection);
    }

    protected function getProducts()
    {
        $productsCollection = Mage::getModel('catalog/product')->getCollection();

        $productsCollection->addAttributeToFilter('status', array(
           'eq' => '1'
        ));

        return $productsCollection;
    }

    public function countProducts()
    {
        $collection = $this->getProducts();

        return sizeof($collection);
    }
}