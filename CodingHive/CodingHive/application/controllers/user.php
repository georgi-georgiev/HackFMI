<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index()
    {
        if($this->session->userdata('user_name')!="")
        {
            redirect('home');
        }
        else{
            $data['error'] = "Трабва да сте логнат за да направите това.";
            $this->load->view('intro_view.php', $data);
        }
    }

    function login()
    {
        $this->form_validation->set_rules('username', 'Потребител', 'callback_check_user_log');
        $this->form_validation->set_rules('password', 'Парола', 'callback_check_password_log');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('intro_view.php');
        }
        else{
            $username=$this->input->post('username');
            $password=md5($this->input->post('password'));
            $result=$this->user_model->login($username,$password);
            if($result)
            {
                $this->index();
            }
            else{
                return false;
            }
        }
    }
    public function registration()
    {
        $this->form_validation->set_rules('username', 'Потребител', 'trim|required|min_length[4]|max_length[32]|xss_clean|callback_check_user_ci');
        $this->form_validation->set_rules('email', 'Имейл', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Парола', 'trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('passwordCorrect', 'Парола отново', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('intro_view.php');
        }
        else{
            $this->user_model->add_user();
            $this->load->view('intro_view.php');
        }
    }
    
    function view($usr)
    {
        $this->db->where("username",$usr);
        $query=$this->db->get("users");
        
        $this->db->where("author",$usr);
        $query2=$this->db->get("projects");
        if($query->num_rows()>0)
        {
            $data['query2'] = $query2;
            $data['query'] = $query;
            $data['title']= 'User view '.$usr;
            $data['content'] = 'user_view.php';
            $this->load->view("template", $data);        
        }
        else{
            echo "undifined user";
        }
    }
    public function logout()
    {
        $newdata = array(
        'user_id'   =>'',
        'user_name'  =>'',
        'logged_in' => FALSE,
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('intro');
    }
    public function check_user_ci()
    {
        $usr=$this->input->post('username');
        $result=$this->user_model->check_user_exist($usr);
        if($result)
        {
            $this->form_validation->set_message('check_user', 'Потребителското име е вече заето');
            return false;
        }
        else
        {
            return true;
        }
    }
    public function check_user_log()
    {
        $username=$this->input->post('username');
        $result=$this->user_model->check_user_exist($username);
        if($result)
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_user_log', 'Потребителското име е грешно');
            return false;
        }
    }
    public function check_password_log()
    {
        $password=md5($this->input->post('password'));
        $result=$this->user_model->check_password_exist($password);
        if($result)
        {
            return true;
        }
        else{
            $this->form_validation->set_message('check_password_log', 'Паролата е грешна');
            return false;
        }
    }
}
?>