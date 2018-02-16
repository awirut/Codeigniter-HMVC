<?php 

class Users_model extends CI_Model
{

   public function __construct()
   {
       parent::__construct();
       //Do your magic here
   }

   public function find_users_by_user($username)
   {
       
       $query = $this->db->where('username', $username)
            ->get('hmvc_users');
        
        return $query->row();
       
   }
   
    
}
