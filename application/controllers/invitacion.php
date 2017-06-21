<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invitacion extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('security');
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		$this->load->model('general');
		$this->load->model('cemail');
	}

	function index(){
		
		$token	= $this->uri->segment(2);
		$key = $this->general->get_temp_invitacion_ACT($token);
		if ($key){
			//aqui voy
		}
	}
	
}
