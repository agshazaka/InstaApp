<?php defined('BASEPATH') OR exit('No direct script access allowed');

class resourches_model extends CI_Model
{
    public function reg()
    {
        $post = $this->input->post();
        $this->nama     = $post['nama'];
        $this->email    = $post['email'];
        $this->password = $post['password'];
        $this->foto     = 'default.png';

        $this->db->insert('user', $this);
    }

    public function edit()
    {
        $post = $this->input->post();
        $this->nama     = $post['nama'];
        $this->email    = $post['email'];
        $this->password = $post['password'];
        $this->foto     = $this->_foto();

        $this->db->update('user', $this, array('id_user' => $post['id_user']));
    }

    private function _foto()
    {
        $config['upload_path']          = './assets/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->input->post('id_user');
        $config['overwrite']			= true;
        $config['max_size']             = 10000; // 5MB
        // $config['max_width']          = 1024;
        // $config['max_height']          = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto') != NULL ) {
            if ($this->upload->do_upload('foto')) {
                return $this->upload->data("file_name");
            } else {
                return "default.png";
                // echo $this->upload->display_errors();
            }
        } else {
            return $this->input->post('foto_lama');
        }
        
    }


}
