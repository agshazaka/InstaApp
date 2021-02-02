<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resourches extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url','download'));	
		//$this->load->model('_model');
	}

	public function index()
	{
		//$this->load->view('admin/login.html'); //view
	}

	public function login()
	{
		$email   	= $this->input->post('email');
        $password   = $this->input->post('password');
        
        $where  = array(
            'email'  => $email,
            'password'  => $password
			);
			
		$cek    = $this->db->get_where("user", $where)->num_rows();
		
		if ($cek > 0) 
        { 
			// login berhasil
            $session_user = array(
				'email'  => $email,
				'status' => "login"
				);
			
			$user = $this->db->get_where('user', ['email' => $email])->row();
			$this->session->set_userdata($session_user);
			$this->session->set_flashdata('success', 'Hi '.$user->nama.'!'); 
			redirect(base_url('index.php/user'));
		} else {
			// login gagal 
			$this->session->set_flashdata('danger', 'Email atau Password Salah!'); 
			redirect(base_url('index.php/guest'));
		}
	}

	public function register()
	{
		if ( $this->input->post('email') != NULL )
		{
			$this->user_model->reg();

			$email   	= $this->input->post('email');
			$password   = $this->input->post('password');
			
			$session_user  = array(
				'email'  => $email,
				'password'  => $password
				);
			
			$user = $this->db->get_where('user', ['email' => $email])->row();
			$this->session->set_userdata($session_user);

			$this->session->set_flashdata('success', 'Berhasil Daftar sebagai Member, silahkan Login!');
			$data['user'] 	= $this->db->get_where('user', ['email' => $email])->row();
			$data['level']	= $this->db->get('_level')->result();
			$data['bab']	= $this->db->get('_bab')->result();

			$this->session->set_flashdata('success', 'Hi '.$user->nama.'!'); 
			$this->load->view('user/dashboard.html', $data);
		} else {
			$this->session->set_flashdata('danger', 'Gagal Daftar sebagai Member, silahkan Coba Kembali!'); 
			redirect(base_url('index.php/guest'));
		}
	}

	public function edit_profile()
	{
		if ($this->input->post('id_user') != NULL) {

			$this->user_model->edit();

			$email	= $this->session->userdata('email');
			$user	= $this->db->get_where('user', ['email' => $email])->row();
			$data['user'] 	= $this->db->get_where('user', ['email' => $email])->row();
			$data['level']	= $this->db->get('_level')->result();
			$data['bab']	= $this->db->get('_bab')->result();

			$this->session->set_flashdata('success', 'Edit Profile Berhasil!');
			redirect(base_url('index.php/user'));
		} else {
			$this->session->set_flashdata('danger', 'Edit Profile Gagal!');
			redirect(base_url('index.php/user'));
		}
			
	}
}
