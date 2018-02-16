<?php 

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('users_model');
        // $this->load->library('users_library');
        // $this->load->library('main_library');
    }

    public function index(){
        echo 'Dashboard';
        $this->load->view('index');
    }

    
}
