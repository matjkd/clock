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
		(3,'Houston, TX','NAM|US|TX|HOUSTON','US/Central'),
		(4,'New York','NAM|US|NJ|NEWARK','America/New_York');
	
	");
	
	
	
	$this->db->query("DROP TABLE IF EXISTS `clockadmin`");
	
	$this->db->query("CREATE TABLE `clockadmin` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `country1` int(11) DEFAULT NULL,
	  `country2` int(11) DEFAULT NULL,
	  `country3` int(11) DEFAULT NULL,
	  `country4` int(11) DEFAULT NULL,
	  `language` int(11) DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	
		$this->db->query("INSERT INTO `clockadmin` (`id`, `country1`, `country2`, `country3`, `country4`, `language`)
VALUES
	(1,1,2,3,4,NULL);");
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
		if ($this->db->table_exists('contacts') )
		{
		  // table exists
		
		$this->db->where('id', 1);
	 	return $this -> db -> get('clockadmin') -> result();	
	 	}
		else
		{
		  // table does not exist
		  echo "no admin table";
		  $this->update_countries();
		} 			
		
			}
		

}