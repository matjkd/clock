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
		$this->load->dbutil();	
		if (!$this->dbutil->database_exists('clock'))
			{
			  //create database..
			  $this->dbforge->create_database('clock');
			  
			}
		
		$admin = $this->admin_model->get_admin();
		
		
		foreach($admin as $row):
			
			$data['country1'] = $this->admin_model->get_city($row->country1);
			
		endforeach;
		$this -> load -> vars($data);
		$this->load->view('main');
	}
	
	
	public function view_clock($version = NULL)
	{
		$this->load->dbutil();	
		if (!$this->dbutil->database_exists('clock'))
			{
			  //create database..
			  $this->dbforge->create_database('clock');
			  
			}
		
		$admin = $this->admin_model->get_admin();
		
		
		foreach($admin as $row):
			
			$data['country1'] = $this->admin_model->get_city($row->country1);
			
		endforeach;
		$this -> load -> vars($data);
		$this->load->view('main');
	}
	public function ajaxclock($version = NULL)
	{
		$this->load->dbutil();	
		if (!$this->dbutil->database_exists('clock'))
			{
			  //create database..
			  $this->dbforge->create_database('clock');
			  
			}
		
		$admin = $this->admin_model->get_admin();
		
		
		
		foreach($admin as $row):
			
			if($version == 1 || $version == NULL) {
			$data['country'] = $this->admin_model->get_city($row->country1);
			}
			if($version == 2) {
			$data['country'] = $this->admin_model->get_city($row->country2);
			}
			
		endforeach;
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