<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if($this->session->userdata('user_name')!="")
        {
                redirect('/home/');
        }
        else{
            $data['title'] = 'Intro Page';
            $this->load->view('intro_view.php', $data);
        }
    }
}