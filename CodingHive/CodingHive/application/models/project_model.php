<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    public function project_add()
    {
        $data=array(
            'title'=>$this->input->post('title'),
            'description'=>preg_replace('/\s+/', ' ',$this->input->post('description')),
            'category'=>$this->input->post('category'),
            'techs'=>preg_replace('/\s+/', ' ',$this->input->post('techs')),
            'author'=>$this->input->post('author'),
            'date'=>$this->input->post('date')
        );
        $this->db->insert('projects',$data);
    }
}
?>