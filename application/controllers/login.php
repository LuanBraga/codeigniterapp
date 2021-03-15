<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller 
{
    public function index()
    {
        $this->load->library('form_validation');

        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
            $this->require_min_level(1);
        }

        $this->setup_login_form();

        $this->load->view('login');
    }

    public function deslogar()
    {
        $this->load->helper('url');

        $this->authentication->logout();

        redirect('/login');
    }
}