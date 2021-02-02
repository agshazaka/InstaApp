<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url','download'));	
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function signup()
	{
		$username   = $this->input->post('username');
		$email   	= $this->input->post('email');
		
		$where  = array(
            'email'  => $email,
            'username'  => $username
			);
			
		$cek    = $this->db->get_where("user", $where)->num_rows();
		
		if ($cek > 0) 
        {
			$this->session->set_flashdata('danger', 'Gagal Daftar, Username atau Email sudah terdaftar, silahkan Coba Kembali!'); 
			redirect(base_url('index.php/welcome'));
		} else {

			$this->user_model->signup();
			
			if ($this->input->post('username') != NULL) {

				$this->user_model->auto_reg_follow();

				$session_user = array(
					'email'  => $email,
					'status' => "login"
					);
	
				$user = $this->db->get_where('user', ['email' => $email])->row();
				$this->session->set_userdata($session_user);
	
				$this->session->set_flashdata('success', 'Berhasil Daftar');
				$data['user'] 	= $this->db->get_where('user', ['email' => $email])->row();
				redirect(base_url('index.php/user/set_session_user/'.$username));
			}
			
            
			// $this->load->view('user_index.php', $data);
		}
			
	}

	public function login()
	{
		$username   = $this->input->post('username');
        $password   = $this->input->post('password');
        
        $where  = array(
            'username'  => $username,
            'password'  => $password
			);
			
		$cek    = $this->db->get_where("user", $where)->num_rows();
		
		if ($cek > 0) 
        { 
			// login berhasil
            $session_user = array(
				'username'  => $username,
				'status' => "login"
				);
			
			$data['user'] 	= $this->db->get_where('user', ['username' => $username])->row();
			$this->session->set_userdata($session_user);
			redirect(base_url('index.php/user/set_session_user/'.$username));
			// $this->load->view('user_index.php', $data);
		} else {
			// login gagal 
			$this->session->set_flashdata('danger', 'Email atau Password Salah!'); 
			$this->load->view('index');
		}

		
	}
}
