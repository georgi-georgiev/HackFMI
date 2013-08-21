<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contacts extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Contacts';
        $data['content'] = 'contacts_view';
        $this->load->view('template', $data);
    }
}
?>