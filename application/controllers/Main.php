<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller
{

    public function index() {

        $this->load->helper('date');

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu_top');
        $this->load->view('main');
        $this->load->view('includes/html_footer');
    }


    public function status() {

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu_top');
        $this->load->view('/ajuda/status');
        $this->load->view('includes/html_footer');
    }

    public function devs() {

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu_top');
        $this->load->view('/ajuda/devteam');
        $this->load->view('includes/html_footer');
    }

    public function sobre() {

        $this->load->view('includes/html_header');
        $this->load->view('includes/menu_top');
        $this->load->view('/ajuda/sobre');
        $this->load->view('includes/html_footer');
    }

}
