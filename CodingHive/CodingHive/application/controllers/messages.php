<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Messages extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['query'] = $this->db->get('messages');
        $data['title'] = 'Messages';
        $data['content'] = 'messages_view';
        $this->load->view('template', $data);
    }
    public function view($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("messages");
        if($query->num_rows()>0)
        {
            $data['query'] = $query;
            $data['title']= 'Message '.$id;
            $data['content'] = 'message_view';
            $this->load->view('template', $data);
        }
            
    }
    public function send()
    {
        $data = array(
              'to_user'=>$this->input->post('to_user'),
              'from_user_id'=>$this->input->post('from_user_id'),
              'from_user_name'=>$this->input->post('from_user_name'),
              'project_id'=>$this->input->post('project_id'),
            );
        $result=$this->db->insert('messages',$data);
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