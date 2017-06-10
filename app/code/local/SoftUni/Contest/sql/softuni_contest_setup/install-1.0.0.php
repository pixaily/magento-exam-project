<?php
/**
 * Created by PhpStorm.
 * User: Daniel Georgiev
 * Date: 10.6.2017 г.
 * Time: 11:12
 */

$installer = $this;
$installer->startSetup();
/**
 * Create table 'softuni_contest/contest'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('softuni_contest/contest'))
    ->addColumn('contest_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable' => false,
        'primary'   => true,
    ), 'Contest ID')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Contest Title')
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Contest Description')
    ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'unsigned' => true,
        'nullable'  => false,
        'default'   => '1',
    ), 'Is Active')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
    ), 'Created At')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
    ), 'Updated At');

$installer->getConnection()->createTable($table);

/**
 * Create table 'softuni_contest/contestant'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('softuni_contest/contestant'))
    ->addColumn('contestant_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Contestant ID')
    ->addColumn('contest_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
    ), 'Contest ID')
    ->addColumn('approved', Varien_Db_Ddl_Table::TYPE_TINYINT, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => '0',
    ), 'Approved')
    ->addColumn('firstname', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'First Name')
    ->addColumn('lastname', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Last Name')
    ->addColumn('dob', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
        'default'   => $installer->getConnection()->getSuggestedZeroDate(),
    ), 'Date of Birth')
    ->addColumn('country', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Country')
    ->addColumn('city', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'City')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
    ), 'Email')
    ->addColumn('message', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
    ), 'Message')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => false
    ), 'Created At')
    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => false
    ), 'Updated At');

$installer->getConnection()->createTable($table);

$installer->endSetup();
