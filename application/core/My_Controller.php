<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Admin_Controller extends My_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('session_user')) {
            $session_user = $this->session->userdata('session_user');
            $this->name = $session_user['users_name'];
            $this->role = $session_user['users_role'];
        } else {
            redirect(base_url('login'));
        }
    }
}
