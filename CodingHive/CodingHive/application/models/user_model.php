<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function login($username,$password)
    {
	$this->db->where("username",$username);
        $this->db->where("password",$password);
            
        $query=$this->db->get("users");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                    'user_id' => $rows->id,
                    'user_name'=> $rows->username,
                    'logged_in'=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;            
	}
        else {
            
            return FALSE;
        }
	
    }
	public function add_user()
	{
		$data=array(
			'username'=>$this->input->post('username'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('users',$data);
	}
	public function check_user_exist($username)
        {

            $this->db->where("username",$username);
            $query=$this->db->get("users");
            if($query->num_rows()>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function check_password_exist($password)
        {

            $this->db->where("password",$password);
            $query=$this->db->get("users");
            if($query->num_rows()>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
}
?>