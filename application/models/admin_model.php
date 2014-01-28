<?php

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function update_countries() {
    	
	$this->db->query("DROP TABLE IF EXISTS `countries`");
	

	$this->db->query("CREATE TABLE `countries` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `city` varchar(255) DEFAULT NULL,
	  `weather_code` varchar(255) DEFAULT NULL,
	  `timezone` varchar(255) DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	
	
	
	$this->db->query("INSERT INTO `countries` (`id`, `city`, `weather_code`, `timezone`)
	VALUES
		(1,'London','EUR|UK|UK001|LONDON','Europe/London');
	
	");
		
	}

}