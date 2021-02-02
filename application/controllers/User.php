<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url','download'));	
		$this->load->model('user_model');
	}

	public function index($username)
	{
		$data['relation']	= $this->db->get_where('follow', ['username' => $username])->result();

		// $data['post']	= $this->db->get_where('galery', ['username' => $])
		$data['user']	= $this->db->get_where('user', ['username' => $username])->row();
		$this->load->view('user_index', $data);
	}

	public function set_session_user($username)
	{
		$session_user = array(
			'username'  => $username,
			'status' => "login"
			);
		$this->session->set_userdata($session_user);
		redirect(base_url('index.php/user/index/'.$username));
	}

	public function myprofile($username)
	{
		$data['cek']	= $this->db->get_where('galery', ['username' => $username])->num_rows();
		$data['post']	= $this->db->get_where('galery', ['username' => $username])->result();
		$data['user']	= $this->db->get_where('user', ['username' => $username])->row();
		$this->load->view('user_myprofile', $data);
	}

	public function profile($username)
	{
		$data['cek']	= $this->db->get_where('galery', ['username' => $username])->num_rows();
		$data['post']	= $this->db->get_where('galery', ['username' => $username])->result();
		$data['user']	= $this->db->get_where('user', ['username' => $username])->row();
		$this->load->view('user_profile', $data);
	}

	public function search($username, $search=NULL)
	{
		$this->db->get_where('user');
		if ($search != NULL) {
			$data['search']	= $this->db->like('username', $search)->result();
		}
		$data['people']	= $this->db->get('user')->result();
		$data['user']	= $this->db->get_where('user', ['username' => $username])->row();
		$this->load->view('user_search', $data);
	}

	public function follow($username, $username_followed)
	{
		if ($username != NULL) 
		{
			$this->user_model->follow($username, $username_followed);
			$this->session->set_flashdata('danger', 'Followed');
			redirect(base_url('index.php/user/search/'.$username));
		} else {
			$this->session->set_flashdata('danger', 'Gagal Follow');
			redirect(base_url('index.php/user/search/'.$username));
		}
	}

	public function unfollow($username, $username_followed)
	{
		if ($username != NULL) 
		{
			$this->user_model->unfollow($username, $username_followed);
			$this->session->set_flashdata('danger', 'Unfollowed');
			redirect(base_url('index.php/user/search/'.$username));
		} else {
			$this->session->set_flashdata('danger', 'Gagal Unfollow');
			redirect(base_url('index.php/user/search/'.$username));
		}
	}

	public function post_like($username, $id_file)
	{
		if ($username != NULL) 
		{
			$this->user_model->post_like($username, $id_file);
			$this->session->set_flashdata('danger', 'Like Berhasil');
			redirect(base_url('index.php/user/index/'.$username));
		} else {
			$this->session->set_flashdata('danger', 'Gagal Like');
			redirect(base_url('index.php/user/index/'.$username));
		}
	}

	public function post_unlike($username, $id_file)
	{
		if ($username != NULL) 
		{
			$this->user_model->post_unlike($username, $id_file);
			$this->session->set_flashdata('danger', 'Unlike Berhasil');
			redirect(base_url('index.php/user/index/'.$username));
		} else {
			$this->session->set_flashdata('danger', 'Gagal Unlike');
			redirect(base_url('index.php/user/index/'.$username));
		}
	}

	public function edit_profile($username)
	{
		if ($this->input->post('username') != NULL) 
		{
			$this->user_model->edit();
			$this->session->set_flashdata('danger', 'Berhasil Edit Profile');
			redirect(base_url('index.php/user/index/'.$username));
		} else {
			$this->session->set_flashdata('danger', 'Gagal Edit Profile');
			redirect(base_url('index.php/user/index/'.$username));
		}
	}

	public function add_post($username)
	{
		if ($this->input->post('username') != NULL) 
		{
			$this->user_model->add_post();
			$this->session->set_flashdata('danger', 'Berhasil mengunggah Post!');
			redirect(base_url('index.php/user/profile/'.$username));
		} else {
			$this->session->set_flashdata('danger', 'Gagal mengunggah Post!');
			redirect(base_url('index.php/user/profile/'.$username));
		}
	}

	public function detil_post($username, $id_file)
	{
		// $username			= $this->session->userdata($username);
		$data['user']		= $this->db->get_where('user', ['username' => $username])->row();
		$data['post'] 		= $this->db->get_where('galery', ['id_file' => $id_file])->row();
		$data['comment']	= $this->db->get_where('comment', ['id_file' => $id_file])->result();
		$data['check']		= $this->db->get_where('comment', ['id_file' => $id_file])->num_rows();
		$this->load->view('user_detil_post', $data);
	}

	public function add_comment($username)
	{
		$post = $this->input->post();
		if ($this->input->post('username') != NULL) 
		{
			$this->user_model->add_comment();
			$this->session->set_flashdata('danger', 'Komentar Berhasil');
			redirect(base_url('index.php/user/detil_post/'.$post['username'].'/'.$post['id_file']));
		} else {
			$this->session->set_flashdata('danger', 'Komentar Gagal');
			redirect(base_url('index.php/user/detil_post/'.$post['username'].'/'.$post['id_file']));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/welcome'));
		// redirect(base_url('index.php/welcome'));
	}
}
