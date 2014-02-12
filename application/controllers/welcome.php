<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	$this->load->database();		
	$admin = $this->admin_model->get_admin();
		
		
		foreach($admin as $row):
			
			$page = $row->page;
			
		endforeach;
	
	
	 $this->view_clock($page);
	}
	
	
	public function view_clock($version = NULL)
	{
		$this->load->dbutil();	
		if (!$this->dbutil->database_exists('clock'))
			{
			  //create database..
			  $this->dbforge->create_database('clock');
			  
			}
			
		$this->load->database();	
		//$this->admin_model->update_countries();
		
		$admin = $this->admin_model->get_admin();
		
		if($version == NULL) {
			$data['version'] = 1;
		} else {
		$data['version'] = $version;
		}
		
		
		foreach($admin as $row):
			
			$data['country1'] = $this->admin_model->get_city($row->country1);
			
			$country1 = $row->country1;
			$country2 = $row->country2;
			$country3 = $row->country3;
			$country4 = $row->country4;
			$page = $row->page;
			$data['refreshrate'] = $row->refreshrate;
			
		endforeach;
		
		
		
		
			
			
			$nextpage = $page + 1;
			if($nextpage == 5) {
				$nextpage = 1;
			}
			
			//set page to nextpage
			if($nextpage == 1 && $country1 > 0) {
				//set page to 1
				$this->admin_model->edit_field('page', 1);
			}
			if($nextpage == 2 && $country2 > 0) {
				//set page to 2
				$this->admin_model->edit_field('page', 2);
			}
			if($nextpage == 3 && $country3 > 0) {
				//set page to 3
				$this->admin_model->edit_field('page', 3);
			}
			if($nextpage == 4 && $country4 > 0) {
				//set page to 4
				$this->admin_model->edit_field('page', 4);
			}
			
			$admin2 = $this->admin_model->get_admin();
			
			$data['refresh'] = 1;
			
			foreach($admin2 as $row2):
			
		
			if($row2->page == $page){
				
				if($page > 1){
				$this->admin_model->edit_field('page', 1);	
				} else {
					$data['refresh'] = 0;
				}
				
			} else {
				$data['refresh'] = 1;
			}
			
			endforeach;
			
			
	
		
		
		
		
		
		
		
		
		$this -> load -> vars($data);
		$this->load->view('main');
	}


	public function ajaxclock($version = NULL)
	{
		$this->load->database();
		$this->load->dbutil();	
		if (!$this->dbutil->database_exists('clock'))
			{
			  //create database..
			  $this->dbforge->create_database('clock');
			  
			}
		
		$admin = $this->admin_model->get_admin();
		
		if($version == NULL) { $version = 1; }
		
		$data['version'] = $version;
		
		foreach($admin as $row):
			
			if($version == 1 || $version == NULL) {
			$data['country'] = $this->admin_model->get_city($row->country1);
			}
			if($version == 2) {
			$data['country'] = $this->admin_model->get_city($row->country2);
			}
			if($version == 3) {
			$data['country'] = $this->admin_model->get_city($row->country3);
			}
			if($version == 4) {
			$data['country'] = $this->admin_model->get_city($row->country4);
			}
			$data['temp'] = $row->temp;
			
		endforeach;
		
		if($data['country'] == NULL) {
			$data['country'] = $this->admin_model->get_city(1);
		}
		
		
		$this -> load -> vars($data);
		$this->load->view('ajaxclock');
		
	}
	
	
	
	
	public function test()
	{
	echo "test";	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */