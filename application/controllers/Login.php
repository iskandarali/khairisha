<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('alert_helper');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');

            if ($this->form_validation->run() != false) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $result_email = $this->users_model->get_email($email);
                if ($result_email != false) {
                    $role = $result_email->users_role;
                    $hash =  $result_email->users_password;
                    if (password_verify($password, $hash)) {
                        echo 'Password is valid!';
                        $user = array(
                            "users_id" => $result_email->users_id,
                            "users_name" => $result_email->users_name,
                            "users_email" => $result_email->users_email,
                            "users_role" => $result_email->users_role,
                        );

                        $this->session->set_userdata('session_user', $user);
                        redirect(base_url('admin'));
                    } else {
                        $this->session->set_flashdata('message', alert("Kata Laluan tidak sah.", "danger"));
                        // redirect(base_url('login'));
                    }
                } else {
                    $this->session->set_flashdata('message', alert("Email tidak sah.", "danger"));
                    // redirect(base_url('login'));
                }
            }
        }
        $this->load->view('login/index');
    }
}
