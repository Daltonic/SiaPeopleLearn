<?php 
class logout extends boiler{
    public function defaultb(){
        session_destroy();
        if (isset($this->auth->uid)) {
            $tokenx=sha1($this->auth->user->email.microtime().rand(0,100));
			$uid=$this->auth->uid;
			$this->db->query("UPDATE users SET token='$tokenx' WHERE uid='$uid'");
            setcookie('_auth',false);
        }
        header("location:" .BURL);
    }
}
 
?>