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
		(1,'London','EUR|UK|UK001|LONDON','Europe/London'),
		(2,'Paris','EUR|FR|FR012|PARIS','Europe/Brussels'),
		(3,'New York','NAM|US|NY|NEW YORK','America/New_York');
	
	");
		
	}
	
	
	function get_cities() {
	
	return $this -> db -> get('countries') -> result();		
	
	}
	
	 function edit_field($field, $value) {
        $user_admin_data = array(
            $field => $value
        );
        $this->db->where('id',1);
        $update = $this->db->update('clockadmin', $user_admin_data);
        return $update;
    }
	 
	 function get_city($id) {
	 $this->db->where('id', $id);
	 	return $this -> db -> get('countries') -> result();			
	 }
	
	
	function get_admin() {
			 $this->db->where('id', 1);
	 	return $this -> db -> get('clockadmin') -> result();			
		
			}
		

}