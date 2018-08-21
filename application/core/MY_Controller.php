<?php

class MY_Controller extends CI_Controller{

    public function __construct() {
        parent::__construct();

        $logged = $this->session->userdata('logged');

        if ($logged != TRUE) {
            $this->alert->set('alert-danger', 'Faça login para continuar.');
            redirect(base_url('login'));
        }

    }
}