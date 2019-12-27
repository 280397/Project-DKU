<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		} else {
			$role_id = $this->session->userdata('role_id');
			$menu = $this->uri->segment(1);

			$queryMenu = $this->db->get_where('users_menu', ['menu' => $menu])->row_array();
			$menu_id = $queryMenu['id'];

			$userAccess = $this->db->get_where('users_access_menu', [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			]);

			if ($userAccess->num_rows() < 1) {
				redirect('Auth/blocked');
			}
		}
		// is_logged_in();
	}

	public function index()
	{
		// ambil data user pada session
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/breadcumb', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function dashboard()
	{
		// ambil data user pada session
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		// $data['count'] = $this->Admin_model->get_count();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/breadcumb', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('templates/footer');
	}

	// method edit profile
	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/breadcumb', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			// cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']      = '2048';
				$config['upload_path']   = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {

					// cek image lama
					$old_image = $data['user']['image'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					// upload file image profile
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Format gambar tidak diizinkan!</div>');
					redirect('User');
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('users');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
			redirect('User');
		}
	}


	// function changepassword
	public function changepassword()
	{
		// ambil data user pada session
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		// rules
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|matches[new_password1]');

		// form validation
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/breadcumb', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			// jika password baru tidak sama dengan data user di database
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
				redirect('User/changepassword');
			} else {

				// cek apakah password yang baru sama dengan password lama
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
					redirect('User/changepassword');
				} else {
					// password sudah ok
					// acak password
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					// ubah password
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('users');

					// pesan
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
					redirect('users');
				}
			}
		}
	}
}
