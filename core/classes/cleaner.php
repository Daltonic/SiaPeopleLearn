<?php 
class cleaner 
{
	public $error="";

	public function __construct($db){
		$this->db=$db;
	}
	public function post($txt){
		if(isset($_POST[$txt])){
			$txt=trim(strip_tags($_POST[$txt])) ;
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}
	
	public function post_lean($txt){
		if(isset($_POST[$txt])){
			$txt=trim($_POST[$txt]) ;
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}


	public function get($txt){
		if(isset($_GET[$txt])){
			$txt=trim(strip_tags($_GET[$txt])) ;
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}

	public function postx($txt){
		if(isset($_POST[$txt])){
			$txt=htmlspecialchars(urlencode(trim($_POST[$txt])))  ;
			$txt=mysqli_real_escape_string($this->db,$txt);
		}else{
			$txt="";
			$this->error.=" $txt is empty";
		}
		return $txt;
	}

	public function postx_decode($txt){
		$txt=htmlspecialchars_decode(urldecode($txt));
		return $txt;
	}

	public function check_params(){
		$this->empty_vars="";
		$args=func_get_args();
		foreach ($args as $item) {
			if($item==""){
				$this->empty_var.=" ".$item.", ";
			}
		}
	}

	public function photo($txt,$path,$base="assets/"){
		if($_FILES[$txt]["error"] == 0){
	        $types = array('image/jpeg','image/gif','image/png');
	        if (in_array($_FILES[$txt]['type'], $types)==1) {
		        $photo=$path.sha1(microtime().rand(0,100)).$_FILES[$txt]['name'];
		        move_uploaded_file($_FILES[$txt]['tmp_name'], $base.$photo);
	        }else{
	        	$photo="";
	        }
	    }else{
	    	$photo=""; 
	    }
		
		return $photo;
	}
	
	public function file($txt,$path,$base="assets/"){
		if($_FILES[$txt]["error"] == 0){
		    $photo=$path.sha1(microtime().rand(0,100)).$_FILES[$txt]['name'];
		    move_uploaded_file($_FILES[$txt]['tmp_name'], $base.$photo);
	       
	    }else{
	    	$photo=""; 
	    }
		
		return $photo;
	}


	public function compress_photo($txt,$path,$base="assets/"){
		if($_FILES[$txt]["error"] == 0){
	        $types = array('image/jpeg','image/gif','image/png');
	        $type  = $_FILES[$txt]['type'];
	        if (in_array($type, $types)==1) {
	        	$image = "";
	        	if ($type == 'image/jpeg'){
					$image = imagecreatefromjpeg($_FILES[$txt]['tmp_name']);
				}elseif ($type == 'image/gif'){
					$image = imagecreatefromgif($_FILES[$txt]['tmp_name']);
				}elseif ($type == 'image/png'){ 
					$image = imagecreatefrompng($_FILES[$txt]['tmp_name']);
				}

				if(filesize ($_FILES[$txt]['tmp_name']) > (pow(1024, 2)*2)){
					$photo=$path.sha1(microtime().rand(0,100)).$_FILES[$txt]['name'];
					imagejpeg($image,  $base.$photo, 25);
				}elseif(filesize ($_FILES[$txt]['tmp_name']) > pow(1024, 2)){
					$photo=$path.sha1(microtime().rand(0,100)).$_FILES[$txt]['name'];
					imagejpeg($image,  $base.$photo, 35);
				}else{
					$photo=$path.sha1(microtime().rand(0,100)).$_FILES[$txt]['name'];
					imagejpeg($image,  $base.$photo, 45);
				}

	        }else{
	        	$photo="";
	        }
	    }else{
	    	$photo=""; 
	    }
		
		return $photo;
	}


		
}

?>