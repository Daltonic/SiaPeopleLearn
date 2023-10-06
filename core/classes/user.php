<?php
	class user {
		public $firstname;
		public $lastname;
		public $uid;
		public $token;
		public $email;
		public $error;
		public $msg;
		public $type;
		public $remember_me=0;

		public function __construct($db, $token) {
			$user_data = $db->query("SELECT * FROM users WHERE token='$token'");
			if ($user_data->num_rows > 0) {
				while ($row = $user_data->fetch_assoc()) {
					$now=time();
					$this->uid = $row['uid'];
					$this->email = $row['email'];
					$this->type = $row['type'];
					$this->firstname = $row['firstname'];
					$this->lastname = $row['lastname'];
					$this->token = $row['token'];
					$this->error = 0;
				}
			}else {
				$this->error = 1;
				$this->msg = 'User Authentication Failed!';
			}
			
		}

		


	}
?>