<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clocking extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('clocking_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model'); 
        $this->load->model('notice_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
        {
            $this->clocking_model->userHasClockedIn("Och1020");
        }
        else
        {
			$this->load->view('login');
        }
	}

    public function clockings()
    {
        $data['clockinglist'] = $this->clocking_model->getAllClockings();
        //print_r($data['clockinglist']);die();
        $this->load->view('backend/clocking', $data);
    }

    public function All_notice(){
        if($this->session->userdata('user_login_access') != False) {
        $data['notice'] = $this->notice_model->GetNotice();
        $this->load->view('backend/notice',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }

    public function clockInUser()
	{
        $this->load->model('clocking_model');

		$ret = $this->clocking_model->clockInUser($this->session->userdata('user_login_id'));
		echo json_encode(TRUE);
    }
    
    public function clockOutUser()
	{
        $this->load->model('clocking_model');

		$ret = $this->clocking_model->clockOutUser($this->session->userdata('user_login_id'));
		echo json_encode(TRUE);
    }    
}