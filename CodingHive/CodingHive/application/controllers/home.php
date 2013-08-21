<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('user_name')!="")
        {
            $query=$this->db->get('projects');
            if($query->num_rows()>0)
            {
                $data['query'] = $query;
            }
            $data['title'] = 'Home Page';
            $data['content'] = 'home_view';
            $this->load->view('template', $data);
        }
        else{
            $data['error'] = "Трабва да сте логнат за да направите това.";
            $this->load->view('intro_view.php', $data);
        }
    }
}