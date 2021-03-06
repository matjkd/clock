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
		$this->load->database();
		$this->load->dbutil();	
		$this->admin_model->update_countries();
		
		$data['cities'] = $this->admin_model->get_cities();
		
		$this -> load -> vars($data);
		$this->load->view('admin_page');
	
	
	}
	
	public function update_clock($clock_number, $city) {
		$this->load->database();
		$city1 = $this->input->post('City1');
		$city2 = $this->input->post('City2');
		$city3 = $this->input->post('City3');
		$city4 = $this->input->post('City4');
		$temp = $this->input->post('temp');
		$timeout = $this->input->post('timeout');
		$this->admin_model->edit_field('country1', $city1);
		$this->admin_model->edit_field('country2', $city2);
		$this->admin_model->edit_field('country3', $city3);
		$this->admin_model->edit_field('country4', $city4);
		$this->admin_model->edit_field('temp', $temp);
		$this->admin_model->edit_field('refreshrate', $timeout);
		
		
		
		
		redirect('');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */