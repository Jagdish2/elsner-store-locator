<?php

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('storelocator')};
CREATE TABLE {$this->getTable('storelocator')} (
  `storelocator_id` int(11) unsigned NOT NULL auto_increment,
  `storelocator_name` varchar(255) NOT NULL default '',
  `storelocator_address` text NOT NULL default '',
  `storelocator_zipcode` smallint(6) NOT NULL default '0',
  PRIMARY KEY (`storelocator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup(); 