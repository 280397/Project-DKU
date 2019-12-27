<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// block acces url jika tidak diizinkan sesuai role
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		} else {
			// access diizinkan sesuai role
			$role_id = $this->session->userdata('role_id');
			$menu = $this->uri->segment(1);

			$queryMenu = $this->db->get_where('users_menu', ['menu' => $menu])->row_array();
			$menu_id = $queryMenu['id'];

			$userAccess = $this->db->get_where('users_access_menu', [
				'role_id' => $role_id,
				'menu_id' => $menu_id
			]);
			// block access setelah login jika access controller sesuai role
			if ($userAccess->num_rows() < 1) {
				redirect('Auth/blocked');
			}
		}
		// is_logged_in();
	}

	public function index()
	{
		// ambil data user pada session
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');
		$data['menu'] = $this->menu->getMenuM();
		// query data menu
		$data['menu'] = $this->db->get('users_menu')->result_array();
		$data['ikon'] = $this->db->get('users_menu')->result_array();


		// rules
		$this->form_validation->set_rules('menu', 'Menu', 'required');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/breadcumb', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [

				'menu' => $this->input->post('menu')

			];
			$this->db->insert('users_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
			redirect('Menu');
		}
	}


	public function submenu()
	{
		// ambil data user pada session
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Menu_model', 'menu');

		// Query Sub Menu
		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('users_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/breadcumb', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('users_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New submenu added!</div>');
			redirect('Menu/submenu');
		}
	}


	// hapus menu
	public function delete($id)
	{
		$this->load->model('Menu_model');
		$this->Menu_model->deleteMenu($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('Menu');
	}
	// edit menu
	public function editm()
	{
		$data['users_menu'] = $this->Menu_model->getMenu($this->uri->segment(3));

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		$this->Menu_model->ubahMenu();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('Menu');
	}

	public function deletesub($id)
	{
		$this->load->model('Menu_model');
		$this->Menu_model->deleteSubMenu($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('Menu/submenu');
	}
}
