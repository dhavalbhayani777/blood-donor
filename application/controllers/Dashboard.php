<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('customer_model');
    }

	public function index()
	{
        $data['title'] = "Blood Donor | Dashboard";

        // $data['total_customer'] = $this->customer_model->getTotalCustomer();

		$this->load->view('template/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('template/footer', $data);
	}
}
