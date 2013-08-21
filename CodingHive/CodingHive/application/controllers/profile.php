<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        if($this->session->userdata('user_name')!="")
        {
            $data['title'] = 'Profile';
            $data['content'] = 'profile_view';
            $this->load->view('template', $data);
        }
        else{
            $data['error'] = "Трабва да сте логнат за да направите това.";
            $this->load->view('intro_view.php', $data);
        }
    }
}
?>