<?php 

class Users extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('users_library');
        $this->load->library('main_library');
    }

    public function index(){
        echo $this->users_model->WelcomeModel()."<br>";
        echo $this->users_library->WelcomeLibrary()."<br>";
        echo $this->main_library->MainLibrary();
        
        // $this->load->view('welcome');
    }

    
}
