<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  // login userr
  public function index()
  {

    // jika terdapat session (login), user tidak bisa mengakses controller auth atau login
    if ($this->session->userdata('email')) {
      redirect('User');
    }

    $this->form_validation->set_rules('email', 'email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login User';
      $data['title2'] = 'DKU Inventory System';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('Auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      // validasi sukses
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // query database
    $user = $this->db->get_where('users', ['email' => $email])->row_array();

    // jika usernya ada
    if ($user) {
      // jika user aktif
      if ($user['tipe'] == 'aktif') {
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'type' => $user['type'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['type'] == 'admin' && $user['role_id'] == 1) {
            redirect('User/dashboard');
          } else {
            redirect('User');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
          redirect('Auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!
        Please contact the administrator!</div>');
        redirect('Auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email is not registered!</div>');
      redirect('Auth');
    }
  }

  // registration



  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="aler">You have been logged  out!</div>');
    redirect('Auth');
  }
  public function blocked()
  {
    $this->load->view('Auth/blocked');
  }
}
