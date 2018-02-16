<?php

class MY_Controller extends MX_Controller
{
    public $language;    
    public function __construct()
    {
        parent::__construct();

        $this->language = (!empty($this->uri->segment(1))) ? $this->uri->segment(1) : null;
        
        if($this->language == 'th' || $this->language == 'en'){

            if(base_url() === $this->currentUrl()){
                $this->config->set_item('base_url', base_url() . $this->language);
            }else{
                $this->config->set_item('base_url', $this->currentUrl() . $this->language);
            }

            $this->lang->load('frontend_lang', $this->language);
            
        }elseif(empty($this->language)){
            redirect(base_url().'welcome', 'location', 301);
        }else{

            if(base_url() === $this->currentUrl()){
                $this->config->set_item('base_url', base_url() . 'th');
                $this->config->set_item('base_url', $this->currentUrl() . 'th');
            }

            if($this->language != 'th' || $this->language != 'en'){
                redirect(base_url() . $this->language, 'location', 301);
            }  

        }   
        
    }

    public function currentUrl()
    {
        $protocal = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? 'https//' : 'http://';
        $current  = $_SERVER['HTTP_HOST'] . '/backend/';

        return $protocal . $current;
    }
    
}