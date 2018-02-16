<?php 

class Users extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('users_library');
        $this->load->library('form_validation');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() === TRUE){
            $username = $this->input->post('username');            
            $password = $this->input->post('password');            
            $remember = (boolean)$this->input->post('remember');
            
            $user = $this->users_library->do_login($username, 
                    $password, 
                    $remember
                );

            print_r($user);

        }else{
            $this->load->view('login');
        }
    }

    public function index()
    {
        $this->load->view('index');
    }
    
}
