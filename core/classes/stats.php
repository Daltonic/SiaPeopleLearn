<?php
	class stats {
		public $all_users;
		public $all_admins;
		public $all_editors;
		public $all_members;
		public $online_users;
		public $suspendend_users;
		public $unsuspendend_users;
		public $blocked_users;
		public $inactive_users;
		public $referal_num=0;

		public function __construct($db) {
			$this->db=$db;
			$all_users = $this->db->query("SELECT * FROM users ");
			$this->all_users=$all_users->num_rows;

			$all_admins = $this->db->query("SELECT * FROM users WHERE type>=8");
			$this->all_admins=$all_admins->num_rows;


			$all_editors = $this->db->query("SELECT * FROM users WHERE type>=5 AND type<8");
			$this->all_editors=$all_editors->num_rows;


			$all_members = $this->db->query("SELECT * FROM users WHERE type<5");
			$this->all_members=$all_members->num_rows;

			$two_minutes_ago=time()-60*2;
			$online_users = $this->db->query("SELECT * FROM users WHERE check_in >=$two_minutes_ago");
			$this->online_users=$online_users->num_rows;

			$suspendend_users = $this->db->query("SELECT * FROM users WHERE is_suspended=1 ");
			$this->suspendend_users=$suspendend_users->num_rows;

			$unsuspendend_users = $this->db->query("SELECT * FROM users WHERE is_suspended=0 ");
			$this->unsuspendend_users=$unsuspendend_users->num_rows;

			$blocked_users = $this->db->query("SELECT * FROM users WHERE is_suspended=2 ");
			$this->blocked_users=$blocked_users->num_rows;


			$inactive_users = $this->db->query("SELECT * FROM users WHERE type=0 ");
			$this->inactive_users=$blocked_users->num_rows;
			
		
		
		}

	}
?>