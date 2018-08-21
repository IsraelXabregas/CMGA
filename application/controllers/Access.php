<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('access_model', 'access');
    }

    public function index() {
        $this->load->view('includes/html_header');
        $this->load->view('includes/menu_top');
        $this->load->view('log_access');
        $this->load->view('includes/html_footer');

    }

    public function DataTablesAccess() {
        $query = $this->access->getTableAccess();
        $data['data'] = $query;
        echo json_encode($data);
    }

}