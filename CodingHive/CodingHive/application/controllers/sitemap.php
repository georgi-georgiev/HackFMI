<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sitemap extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Sitemap';
        $data['content'] = 'sitemap_view';
        $this->load->view('template', $data);
    }
}
?>
