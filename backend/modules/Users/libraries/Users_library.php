<?php 

class Users_library
{
    public $CI;
    public $class;    
    public $method;
    public function __construct()
    {
      $this->CI =& get_instance();
      $this->class = $this->CI->router->fetch_class();
      $this->method = $this->CI->router->fetch_method();
      
    }

    
    public function check_Login()
    {
        if($this->_is_logget_in()){
            if($this->class ==='users' && $this->method === 'login'){
                redirect(base_url('dashboard'),'refresh');
            }
        }else{
            if($this->class === 'users' && $this->method === 'login'){

            }else{
                redirect(base_url('users/login'),'refresh');
            }
        }
    }


    public function _is_logget_in()
    {
        return (boolean)$this->CI->session->userdata('userUID');
    }
    
    public function do_login($username, $password, $remember = FALSE)
    {
        $this->CI->load->model('users_model');
        
        if(empty($username) && empty($password)){
            return false;
        }

        $users = $this->CI->users_model->find_users_by_user($username);

        if($users){
            return $users;
        }else{
            return false;
        }
    }
    
    
    // HashPassword

    public function salt()
	{
		$raw_salt_len = 16;
		$buffer = '';

		$bl = strlen($buffer);
		for($i = 0; $i < $raw_salt_len; $i++) {
			if($i < $bl) {
				$buffer[$i] = $buffer[$i] ^ chr(mt_rand(0,255));
			}else{
				$buffer .= chr(mt_rand(0,255));
			}
		}

		$salt = $buffer;


		$base64_digits = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $base64_string = base64_encode($salt);
        $salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);

        $salt = substr($salt, 0, 31);

        return $salt;

	}

	public function hash_password($password,$salt)
	{
		if(empty($password)){
			return false;
		}

		return sha1($password.$salt);
	}

}
