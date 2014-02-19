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
		(7,'Houston','NAM|US|TX|HOUSTON','America/Chicago'),
	(8,'Montreal','NAM|CA|QC|MONTRÉAL','America/Montreal'),
	(9,'Vancouver','NAM|CA|BC|VANCOUVER','America/Vancouver'),
	(10,'Calgary','NAM|CA|AB|CALGARY','America/Edmonton'),
	(11,'Toronto','NAM|CA|ON|TORONTO','America/Toronto'),
	(12,'Buenos Aires','SAM|AR|AR007|BUENOS AIRES','America/Argentina/Buenos_Aires'),
	(13,'Rio de Janeiro','SAM|BR|BR017|RIO DE JANEIRO','America/Brasilia'),
	(14,'Brasilia','SAM|BR|BR007|BRASILIA','America/Brasilia'),
	(15,'Sao Paulo','SAM|BR|BR023|SAO PAULO','America/Brasilia'),
	(16,'Mexico City','NAM|MX|MX009|MEXICO CITY','America/Mexico_City'),
	(17,'Melbourne','OCN|AU|VIC|MELBOURNE','Australia/Melbourne'),
	(18,'Canberra','OCN|AU|ACT|CANBERRA','Australia/Canberra'),
	(19,'Sydney','OCN|AU|NSW|SYDNEY','Australia/Sydney'),
	(20,'Beijing','ASI|CN|CH002|BEIJING','Asia/Shanghai'),
	(21,'Shanghai','ASI|CN|CH024|SHANGHAI','Asia/Shanghai'),
	(22,'Shenzhen','ASI|CN|CH031|SHENZHEN','Asia/Shanghai'),
	(23,'Hong Kong','ASI|HK|HK---|HONG KONG','Asia/Hong_Kong'),
	(24,'Bangalore','ASI|IN|IN017|BANGALORE','Asia/Kolkata'),
	(25,'New Delhi','ASI|IN|IN010|NEW DELHI','Asia/Kolkata'),
	(26,'Mumbai','ASI|IN|IN021|MUMBAI','Asia/Kolkata'),
	(27,'Pune','ASI|IN|IN021|PUNE','Asia/Kolkata'),
	(28,'Wellington','OCN|NZ|NZ000|WELLINGTON','Pacific/Auckland'),
	(29,'Singapore','ASI|SG|SN---|SINGAPORE','Singapore'),
	(30,'Bangkok','ASI|TH|TH017|BANGKOK','Asia/Bangkok'),
	(31,'Tokyo','ASI|JP|JA041|TOKYO','Asia/Tokyo'),
	(32,'Osaka','ASI|JP|JA033|HIGASHIOSAKA','Asia/Tokyo'),
	(33,'Nagoya','ASI|JP|JA001|NAGOYA','Asia/Tokyo'),
	(34,'Seoul','ASI|KR|KS013|SEOUL','Asia/Seoul'),
	(35,'Taipei','ASI|TW|TW018|TAIPEI','Asia/Taipei'),
	(36,'Wien','EUR|AT|AU009|WIEN','Europe/Vienna'),
	(37,'Vienna','EUR|AT|AU009|WIEN','Europe/Vienna'),
	(38,'Brussels','EUR|BE|BE001|ANTWERPEN','Europe/Brussels'),
	(39,'Amsterdam','EUR|NL|NL008|AMSTERDAM','Europe/Amsterdam'),
	(40,'Ballerup','EUR|DK|DA012|COPENHAGEN','Europe/Copenhagen'),
	(41,'Kista','EUR|SE|SW015|STOCKHOLM','Europe/Stockholm'),
	(42,'Paris','EUR|FR|FR012|PARIS','Europe/Paris'),
	(43,'Sophia Antipolis','EUR|MC|MN000|MONACO','Europe/Monaco'),
	(44,'Stuttgart','EUR|DE|GM001|STUTTGART','Europe/Berlin'),
	(45,'Frankfurt','EUR|DE|GM007|FRANKFURT AM MAIN','Europe/Berlin'),
	(46,'Berlin','EUR|DE|GM003|BERLIN','Europe/Berlin'),
	(47,'Hamburg','EUR|DE|GM006|HAMBURG','Europe/Berlin'),
	(48,'Dusseldorf','EUR|DE|GM011|DÜSSELDORF','Europe/Berlin'),
	(49,'Munich','EUR|DE|GM002|MÜNCHEN','Europe/Berlin'),
	(50,'Athens','NAM|US|GA|ATHENS','Europe/Athens'),
	(51,'Winnersh','EUR|UK|UK001|WOKINGHAM','Europe/London'),
	(52,'London','EUR|UK|UK001|LONDON','Europe/London'),
	(53,'Dublin','EUR|IE|EI006|DUBLIN','Europe/Dublin'),
	(54,'Tel Hai','MEA|IL|IS005|TEL AVIV-YAFO','Asia/Tel_Aviv'),
	(55,'Tel Aviv','MEA|IL|IS005|TEL AVIV-YAFO','Asia/Tel_Aviv'),
	(56,'Rome','EUR|IT|IT007|ROMA','Europe/Rome'),
	(57,'Milan','EUR|IT|IT009|MILANO','Europe/Rome'),
	(58,'Warszawa','EUR|PL|PL007|WARSZAWA','Europe/Warsaw'),
	(59,'Lisbon','EUR|PT|PO012|LISBOA','Europe/Lisbon'),
	(60,'Moscow','ASI|RU|RS052|MOSKVA','Europe/Moscow'),
	(61,'Madrid','EUR|ES|SP013|MADRID','Europe/Madrid'),
	(62,'Barcelona','EUR|ES|SP008|BARCELONA','Europe/Madrid'),
	(63,'Zurich','EUR|CH|SZ026|ZÜRICH','Europe/Zurich'),
	(64,'Istanbul','MEA|TR|TU040|ISTANBUL','Europe/Istanbul'),
	(65,'Sandton','AFR|ZA|SF004|SANDTON','Africa/Johannesburg');
	
	");
	
	
	
	$this->db->query("DROP TABLE IF EXISTS `clockadmin`");
	
	$this->db->query("CREATE TABLE `clockadmin` (
	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `country1` int(11) DEFAULT NULL,
	  `country2` int(11) DEFAULT NULL,
	  `country3` int(11) DEFAULT NULL,
	  `country4` int(11) DEFAULT NULL,
	  `language` int(11) DEFAULT NULL,
	  `temp` varchar(1) DEFAULT NULL,
	  `page` int(11) DEFAULT NULL,
	  `refreshrate` int(11) DEFAULT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
	
		$this->db->query("INSERT INTO `clockadmin` (`id`, `country1`, `country2`, `country3`, `country4`, `language`, `temp`, `page`, `refreshrate`)
VALUES
	(1,1,2,3,4,NULL, 'C', 1, 10000);");
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
		if ($this->db->table_exists('clockadmin') )
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