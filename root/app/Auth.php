<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Auth extends Model implements AuthenticatableContract, CanResetPasswordContract {

	private $table_name = 'user';
	 function __construct()
	 {
	 	 parent :: __construct();
	 	 // $this->load->model(array('Encrypt_m'));
	 }
	 function process_login($login_array_input = NULL)
   	{
	 	 if(!isset($login_array_input) OR count($login_array_input) != 2)
	 	 	 return	false;
	 	 	 //set	its	variable
	 	 	 $username = $login_array_input[0];
	 	 	 $password = $login_array_input[1];
	 	 	 //	select	data	from	database	to	check	user	exist	or	not?
	 	 	 $this->db->where('username', $username);
	 	 	 $this->db->limit(1);
	 	 	 $query = $this->db->get('user_login');
	 	 	 if	($query->num_rows() > 0) {
	 	 	 	 $row = $query->row();
	 	 	 	 $user_id = $row->username;
	 	 	 	 $user_pass = $row->password;
	 	 	 	 $rule	= $row->rule;
	 	 	 	 if($password === $user_pass)	{
		 	 	 	 $this->session->set_userdata('logged_user', $user_id);
	 	 	 	 	 $this->session->set_userdata('rule', $rule);
	 	 	 	 	 return	true;
	 	 	 	 }
	 	 	 	 return	false;
	 	 	 }
	 	 return	false;
	 }
	 function check_logged(){
	 	 return	($this->session->userdata('logged_user'))?TRUE:FALSE;
	 }
	 function logged_id(){
		 return	($this->check_logged())?$this->session->userdata('logged_user'):'';
	 }
}
