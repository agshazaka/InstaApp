<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function signup()
    {
        $post = $this->input->post();
		$this->fullname	    = $post['fullname'];
        $this->username	    = $post['username'];
        $this->email        = $post['email'];
        $this->password     = $post['password'];
        $this->foto_profile = $post['foto_profile'];

        return $this->db->insert('user', $this);
    }

    public function auto_reg_follow()
    {
        $post = $this->input->post();
        $follower = array(
                'datetime'	        => date('h:s, t-m-Y'),
                'username'	        => $post['username'],
                'username_followed' => $post['username']
            );
        return $this->db->insert('follow', $follower);
    }

    public function follow($username, $username_followed)
    {
        $this->datetime         = date('h:s, t-m-Y');
        $this->username	        = $username;
        $this->username_followed= $username_followed;

        $this->db->insert('follow', $this);
    }

    public function unfollow($username, $username_followed)
    {
        // $this->username	        = $username;
        // $this->username_followed= $username_followed;

        $this->db->delete('follow', array('username' => $username, 'username_followed' => $username_followed));
	}
	
	public function post_like($username, $id_file)
    {
        $this->datetime	= date('h:s, t-m-Y');
        $this->username	= $username;
        $this->id_file	= $id_file;

        $this->db->insert('like_post', $this);
	}
	
	public function post_unlike($username, $id_file)
    {
        $this->db->delete('like_post', array('username' => $username, 'id_file' => $id_file));
    }

    public function edit()
    {
        $post = $this->input->post();
        $this->foto_profile = $this->_foto_profile();
        $this->fullname     = $post['fullname'];
        $this->email        = $post['email'];
        $this->tentang      = $post['tentang'];
        $this->username     = $post['username'];
        $this->password     = $post['password'];

        $this->db->update('user', $this, array('username' => $post['username']));
    }

    private function _foto_profile()
    {
        $config['upload_path']          = './assets/images/profiles/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = $this->input->post('username');
        $config['overwrite']			= true;
        $config['max_size']             = 10000; // 5MB
        // $config['max_width']          = 1024;
        // $config['max_height']          = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_profile') != NULL ) {
            if ($this->upload->do_upload('foto_profile')) {
                return $this->upload->data("file_name");
            } else {
                return $this->input->post('foto_profile_lama');
            }
        } else {
            return $this->input->post('foto_profile_lama');
        }
        
	}

    public function add_post()
    {
        $post = $this->input->post();
        $this->id_file  = $this->id_file();
        $this->file     = $this->_post();
        $this->caption  = $post['caption'];
        $this->username = $post['username'];
        $this->datetime = date('h:s, t-m-Y');

        $this->db->insert('galery', $this);
    }

    private function _post()
    {
        $config['upload_path']          = './assets/images/post/photos/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = $this->id_file();
        $config['overwrite']			= true;
        $config['max_size']             = 10000; // 5MB
        // $config['max_width']          = 1024;
        // $config['max_height']          = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_post') != NULL ) {
            if ($this->upload->do_upload('file_post')) {
                return $this->upload->data("file_name");
            }
        }
        
    }
    
    private function id_file()
    {
        $date       = date('dmY');
        $time       = date('His');
        $username   = $this->input->post('username');
        $userfirst  = substr($username, 0, 3);
        $userlast   = substr($username, -3, 3);
        $result     = $userfirst.$date.$userlast.$time;

        return $result;
    }

    public function add_comment()
    {
        $post = $this->input->post();
        $this->id_file  = $post['id_file'];
        $this->comment  = $post['comment'];
        $this->username = $post['username'];
        $this->datetime = date('h:s, t-m-Y');

        $this->db->insert('comment', $this);
    }
}
