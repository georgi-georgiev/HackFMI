<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
    }
    public function index()
    {
        if($this->session->userdata('user_name')!="")
        {
            $this->db->where("author",$this->session->userdata('user_name'));
            $query=$this->db->get("projects");
            if($query->num_rows()>0)
            {
                $data['query'] = $query;
            }
            $data['title'] = 'Projects';
            $data['content'] = 'my_projects_view';
            $this->load->view('template', $data);
        }
        else{
            $data['error'] = "Трабва да сте логнат за да направите това.";
            $this->load->view('intro_view.php', $data);
        }
    }
    public function view($id)
    {
        if($this->session->userdata('user_name')!="")
        {
            $this->db->where("id",$id);
            $query=$this->db->get("projects");
            
            $query2 = $this->db->query("select * from users, users_projects where user_id=users.id and project_id=$id");
            
            $data['query']=$query;
            $data['query2']=$query2;
            $data['title'] = 'Project view';
            $data['content'] = 'project_view';
            $this->load->view('template', $data);
        }
        else{
            $data['error'] = "Трабва да сте логнат за да направите това.";
            $this->load->view('intro_view.php', $data);
        }
    }
    public function create()
    {
        if($this->session->userdata('user_name')!="")
        {
            $data['title'] = 'Project add';
            $data['content'] = 'project_create_view';
            $this->load->view('template', $data);
        }
        else{
            $data['error'] = "Трабва да сте логнат за да направите това.";
            $this->load->view('intro_view.php', $data);
        }
    }
    public function add()
    {
        $this->form_validation->set_rules('title', 'Заглавие', 'trim|required|min_length[6]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('description', 'Описание', 'trim|required|min_length[10]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('techs', 'Технологии', 'trim|required|min_length[3]|max_length[50]|xss_clean');
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else{
            $this->project_model->project_add();
            $this->index();
        }
    }
    public function add_user($user_id, $project_id)
    {
        $data = array(
            'user_id' => $user_id,
            'project_id' => $project_id
        );

        $result=$this->db->insert('users_projects', $data);
        if($result)
        {
            redirect('project');
        }
        else
        {
            redirect('home');
        }
    }
}
?>