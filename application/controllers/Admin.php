<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('alert_helper');
        $this->load->model('position_model');
        $this->load->model('gred_model');
        $this->load->model('department_model');
        $this->load->model('job_model');

        $this->waran = $this->department_model->list_department();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $job_work = 0;
        $job_vacant = 0;

        foreach ($this->job_model->list_job() as $job) {

            $job_work += $job->position_num_work;
            $job_vacant += $job->position_num_vacant;
        }

        $data['count'] = array(
            'department' => $this->department_model->count_department(),
            'gred' => $this->gred_model->count_gred(),
            'job_num_work' => $job_work,
            'job_num_vacant' => $job_vacant,
            'user' => count($this->users_model->get_all_user())
        );
        $this->load->view('layout/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('layout/footer');
    }

    public function user($method = null, $id = null)
    {

        $data['user'] = $this->users_model->get_id($id);
        if ($method == 'add') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->form_validation->set_rules('user_name', 'name', 'required');
                $this->form_validation->set_rules('user_email', 'email', 'required');
                $this->form_validation->set_rules('user_password', 'password', 'required');
                $this->form_validation->set_rules('user_status', 'status', 'required');

                if ($this->form_validation->run() != false) {
                    $dataUser = array(
                        'users_name' => $this->input->post('user_name'),
                        'users_email' => $this->input->post('user_email'),
                        'users_status' => $this->input->post('user_status'),
                        'users_role' => $this->input->post('user_role'),
                        'users_password' => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT)
                    );
                    $this->users_model->insert_user($dataUser);
                    $this->session->set_flashdata('message', alert('Berjaya menambah pengguna.', 'success'));
                    redirect(base_url('admin/user/add'));
                }
            }
            $data['title'] = "Pendaftaran Pengguna";
            $this->load->view('layout/header', $data);
            $this->load->view('admin/user/user_add');
            $this->load->view('layout/footer');
        } elseif ($method == 'edit' && $data['user'] != false) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->form_validation->set_rules('user_name', 'name', 'required');
                $this->form_validation->set_rules('user_email', 'email', 'required');
                $this->form_validation->set_rules('user_password', 'password', 'required');
                $this->form_validation->set_rules('user_status', 'status', 'required');
                if ($this->form_validation->run() != false) {
                    $dataUser = array(
                        'users_name' => $this->input->post('user_name'),
                        'users_email' => $this->input->post('user_email'),
                        'users_status' => $this->input->post('user_status'),
                        'users_role' => $this->input->post('user_role'),
                        'users_password' => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT)
                    );
                    $this->users_model->update_user($id, $dataUser);
                    $this->session->set_flashdata('message', alert('Berjaya mengemas kini pengguna.', 'success'));
                    redirect(base_url('admin/user/edit/' . $id));
                }
            }
            $data['title'] = "Edit Pengguna";
            $this->load->view('layout/header', $data);
            $this->load->view('admin/user/user_edit');
            $this->load->view('layout/footer');
        } elseif ($method == 'delete' && $data['user'] != false) {
            $user_data = array(
                'users_status' => '2',
                'users_updated_at' => date('Y-m-d H:i:s'),
            );
            $this->users_model->update_user($id, $user_data);
            $this->session->set_flashdata('message', alert('Pengguna telah dipadamkan.', 'success'));
            redirect(base_url('admin/user/user_delete'));
         } else {
            $data['title'] = "Senarai Pengguna";
            $data['list_user'] = $this->users_model->get_all_user();
            $this->load->view('layout/header', $data);
            $this->load->view('admin/user/index');
            $this->load->view('layout/footer');
        }
    }


    public function department($action = null, $id = null)
    {
        // %20
        $data['department'] =  $this->department_model->get_department_by_id($id);
        // replace %20
        if ($action == 'add') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $this->form_validation->set_rules('department_name', 'Department Name', 'required|trim|is_unique[department.department_name]');
                $this->form_validation->set_rules('department_status', 'Status', 'required|trim');

                if ($this->form_validation->run() != false) {
                    $department_data = array(
                        'department_name' => $this->input->post('department_name'),
                        'department_status' => $this->input->post('department_status')
                    );
                    $this->department_model->insert_department($department_data);
                    $this->session->set_flashdata('message', alert('Jabatan telah ditambah.', 'success'));
                    redirect(base_url('admin/department'));
                }
            }
            $data['title'] = 'Tambah Jabatan';
            $this->load->view('layout/header', $data);
            $this->load->view('admin/department/department_add');
            $this->load->view('layout/footer');
        } elseif ($action == 'edit' && $data['department'] != false) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $this->form_validation->set_rules('department_name', 'Department Name', 'required|trim');
                $this->form_validation->set_rules('department_status', 'Status', 'required|trim');

                if ($this->form_validation->run() != false) {
                    $department_data = array(
                        'department_name' => $this->input->post('department_name'),
                        'department_status' => $this->input->post('department_status')
                    );
                    $this->department_model->update_department($id, $department_data);
                    $this->session->set_flashdata('message', alert('Jabatan telah dikemas kini.', 'success'));
                    redirect(base_url('admin/department'));
                }
            }
            $data['title'] = 'Edit Jabatan';
            $this->load->view('layout/header', $data);
            $this->load->view('admin/department/department_edit');
            $this->load->view('layout/footer');
        } elseif ($action == 'delete' && $data['department'] != false) {
            $department_data = array(
                'department_status' => '3',
                'department_deleted_at' => date('Y-m-d H:i:s'),
            );
            $this->department_model->update_department($id, $department_data);
            $this->session->set_flashdata('message', alert('Jabatan telah dipadamkan.', 'success'));
            redirect(base_url('admin/department'));
        } else {
            $data['title'] = 'Senarai Jabatan';
            $data['list_department'] = $this->department_model->list_department();
            $this->load->view('layout/header', $data);
            $this->load->view('admin/department/index');
            $this->load->view('layout/footer');
        }
    }

    public function position($department_id, $action = null, $id = null)
    {
        $data['department'] = $this->department_model->get_department_by_id($department_id);
        $data['position'] = $this->position_model->get_position_by_id($id);
        if ($data['department'] != false) {
            if ($action == 'add') {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $this->form_validation->set_rules('position_name', 'Position Name', 'required|trim|is_unique[position.position_name]');
                    $this->form_validation->set_rules('position_status', 'Status', 'required|trim');

                    if ($this->form_validation->run() != false) {
                        $position_data = array(
                            'position_name' => $this->input->post('position_name'),
                            'position_status' => $this->input->post('position_status'),
                            'position_department_id' => $department_id
                        );
                        $this->position_model->insert_position($position_data);
                        $this->session->set_flashdata('message', alert('Berjaya ditambah.', 'success'));
                        redirect(base_url('admin/position/' . $department_id));
                    }
                }
                $data['title'] = 'Tambah Jabatan ' . $data['department']->department_name;
                $this->load->view('layout/header', $data);
                $this->load->view('admin/position/position_add');
                $this->load->view('layout/footer');
            } elseif ($action == 'edit' && $data['position'] != false) {

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $this->form_validation->set_rules('position_name', 'Position Name', 'required|trim');
                    $this->form_validation->set_rules('position_status', 'Status', 'required|trim');

                    if ($this->form_validation->run() != false) {
                        $position_data = array(
                            'position_name' => $this->input->post('position_name'),
                            'position_status' => $this->input->post('position_status')
                        );
                        $this->position_model->update_position($id, $position_data);
                        $this->session->set_flashdata('message', alert('Berjaya dikemas kini.', 'success'));
                        redirect(base_url('admin/position/' . $department_id));
                    }
                }
                $data['title'] = 'Edit Jabatan';
                $this->load->view('layout/header', $data);
                $this->load->view('admin/position/position_edit');
                $this->load->view('layout/footer');
            } elseif ($action == 'delete' && $data['position'] != false) {
                $position_data = array(
                    'position_status' => '3',
                    'position_deleted_at' => date('Y-m-d H:i:s'),
                );
                $this->position_model->update_position($id, $position_data);
                $this->session->set_flashdata('message', alert('Berjaya dipadamkan.', 'success'));
                redirect(base_url('admin/position/' . $department_id));
            } elseif ($action == 'view' && $data['position'] != false) {
                $method = "";
                if (isset($_GET['action']) && isset($_GET['id'])) {
                    $method = $_GET['action'];
                    $id_code = $_GET['id'];
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && $method == 'add') {

                    $dataJob = array(
                        'position_id' => $data['position']->position_id,
                        'gred_id' => $this->input->post('gred'),
                        'position_num_work' => $this->input->post('bil_waran'),
                        'position_num_vacant' => $this->input->post('bil_isi'),
                    );

                    if ($this->job_model->get_position_id_and_gred_id($data['position']->position_id, $this->input->post('gred')) == false) {
                        $this->job_model->insert_job($dataJob);
                        $this->session->set_flashdata('message', alert('Gred berjaya ditambah.', 'success'));
                    } else {
                        $this->session->set_flashdata('message', alert('Gred telah wujud di dalam senarai.', 'danger'));
                    }

                    redirect(base_url('admin/position/' . $department_id . '/' . $action . '/' . $id));
                } elseif ($method == 'delete') {
                    $dataJob = array(
                        'job_status' => '3',
                    );
                    $this->job_model->update_job($id_code, $dataJob);
                    $this->session->set_flashdata('message', alert('Gred telah dipadamkan.', 'success'));
                    redirect(base_url('admin/position/' . $department_id . '/view/' . $id . '/'));
                } elseif ($method == 'edit') {

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $dataJob = array(
                            'gred_id' => $this->input->post('gred'),
                            'position_num_work' => $this->input->post('bil_waran'),
                            'position_num_vacant' => $this->input->post('bil_isi'),
                        );
                        if ($this->gred_model->get_gred_by_gred_id($this->input->post('gred')) == false) {
                            $this->session->set_flashdata('message', alert('Sila pilih gred yang betul.', 'danger'));
                        } else if ($this->job_model->get_position_id_and_gred_id($data['position']->position_id, $this->input->post('gred')) == false) {
                            $this->job_model->update_job($id_code, $dataJob);
                            $this->session->set_flashdata('message', alert('Gred berjaya dikemas kini.', 'success'));
                        } elseif ($this->job_model->get_job_by_id($id_code)->gred_id == $this->input->post('gred')) {
                            $this->job_model->update_job($id_code, $dataJob);
                            $this->session->set_flashdata('message', alert('Gred berjaya dikemas kini.', 'success'));
                        } else {
                            $this->session->set_flashdata('message', alert('Gred telah wujud di dalam senarai.', 'danger'));
                        }

                        redirect(base_url('admin/position/' . $department_id . '/' . $action . '/' . $id . '?action=edit&id=' . $id_code));
                    }

                    $data['detail'] = $this->job_model->get_position_job_id($id_code);
                    $data['title'] = 'Edit Gred ' . $data['detail']->gred_name;
                    $data['list_gred'] = $this->gred_model->list_gred();

                    $this->load->view('layout/header', $data);
                    $this->load->view('admin/position/waran_position_edit');
                    $this->load->view('layout/footer');
                } else {
                    $data['title'] = 'Bilangan Waran';
                    $data['list_gred'] = $this->gred_model->list_gred();
                    $data['list_job'] = $this->job_model->list_job_by_position_id($data['position']->position_id);
                    // echo "<pre>" . print_r($data['list_job'], true) . "<pre>";
                    $this->load->view('layout/header', $data);
                    $this->load->view('admin/position/waran_add');
                    $this->load->view('layout/footer');
                }
            } else {
                $data['title'] = 'Senarai Jabatan - Jabatan';
                $data['list_position'] = $this->position_model->list_position_by_department_id($department_id);
                $this->load->view('layout/header', $data);
                $this->load->view('admin/position/index');
                $this->load->view('layout/footer');
            }
        } else {
            redirect(base_url('admin/department'));
        }
    }

    public function gred($action = null, $id = null)
    {
        $data['gred'] =  $this->gred_model->get_gred_by_gred_id($id);
        if ($action == 'add') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $this->form_validation->set_rules('gred_name', 'Gred Name', 'required|trim|is_unique[gred.gred_name]');
                // $this->form_validation->set_rules('department_status', 'Status', 'required|trim');

                if ($this->form_validation->run() != false) {
                    $gred_data = array(
                        'gred_name' => $this->input->post('gred_name'),
                        // 'department_status' => $this->input->post('department_status')
                    );
                    $this->gred_model->insert_gred($gred_data);
                    $this->session->set_flashdata('message', alert('Gred telah ditambah.', 'success'));
                    redirect(base_url('admin/gred'));
                }
            }
            $data['title'] = 'Tambah Gred';
            $this->load->view('layout/header', $data);
            $this->load->view('admin/gred/gred_add');
            $this->load->view('layout/footer');
        } elseif ($action == 'delete' && $data['gred'] != false) {
            $gred_data = array(
                'gred_status' => '3',
                'gred_updated_at' => date('Y-m-d H:i:s'),
            );
            $this->gred_model->update_gred($id, $gred_data);
            $this->session->set_flashdata('message', alert('Gred telah dipadamkan.', 'success'));
            redirect(base_url('admin/gred'));
        } else {
            $data['title'] = 'Senarai Gred';
            $data['list_gred'] = $this->gred_model->list_gred();
            $this->load->view('layout/header', $data);
            $this->load->view('admin/gred/index');
            $this->load->view('layout/footer');
        }
    }
}
