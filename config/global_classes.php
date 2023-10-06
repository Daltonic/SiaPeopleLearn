<?php 
	$this->clean=new clean($this->db);
	$this->alert=new alert;
	$this->api=new api;
	$this->auth=new auth($this->db);
	$this->mail=new mail();
?>