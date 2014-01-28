<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clockadmin extends CI_Controller {

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
		$this->admin_model->update_countries();
		
		$data['cities'] = $this->admin_model->get_cities();
		
		$this -> load -> vars($data);
		$this->load->view('admin_page');
	
	
	}
	
	public function update_clock($clock_number, $city) {
		$city1 = $this->input->post('City1');
		$this->admin_model->edit_field('country1', $city1);
		
		
		
		redirect('/');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */