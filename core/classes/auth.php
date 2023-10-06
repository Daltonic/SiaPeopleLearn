<?php 
class auth {

	public $error = 0;
	public $error_msg = '';
	public $token;
	public $user;
	public $isonline=0;
	public $uid;

    public function __construct($db){	
    	$this->base_url=BURL;
	   	$this->login_page=LOGINPG;
	   	$this->alert=new alert();
	   	if(isset($_SESSION["_auth"])){
	   		$this->token=$_SESSION['_auth'];
			$this->user=new user($db,$this->token);
			if($this->user->error==0){
				$this->isonline=1;
				$this->uid=$this->user->uid;
			}	   		
	   	}
    }
	
	
	public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
		    $output = NULL;
		    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
		        $ip = $_SERVER["REMOTE_ADDR"];
		        if ($deep_detect) {
		            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
		                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
		                $ip = $_SERVER['HTTP_CLIENT_IP'];
		        }
		    }
		    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
		    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
		    $continents = array(
		        "AF" => "Africa",
		        "AN" => "Antarctica",
		        "AS" => "Asia",
		        "EU" => "Europe",
		        "OC" => "Australia (Oceania)",
		        "NA" => "North America",
		        "SA" => "South America"
		    );
		    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
		        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
		        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
		            switch ($purpose) {
		                case "location":
		                    $output = array(
		                        "city"           => @$ipdat->geoplugin_city,
		                        "state"          => @$ipdat->geoplugin_regionName,
		                        "country"        => @$ipdat->geoplugin_countryName,
		                        "country_code"   => @$ipdat->geoplugin_countryCode,
		                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
		                        "continent_code" => @$ipdat->geoplugin_continentCode
		                    );
		                    break;
		                case "address":
		                    $address = array($ipdat->geoplugin_countryName);
		                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
		                        $address[] = $ipdat->geoplugin_regionName;
		                    if (@strlen($ipdat->geoplugin_city) >= 1)
		                        $address[] = $ipdat->geoplugin_city;
		                    $output = implode(", ", array_reverse($address));
		                    break;
		                case "city":
		                    $output = @$ipdat->geoplugin_city;
		                    break;
		                case "state":
		                    $output = @$ipdat->geoplugin_regionName;
		                    break;
		                case "region":
		                    $output = @$ipdat->geoplugin_regionName;
		                    break;
		                case "country":
		                    $output = @$ipdat->geoplugin_countryName;
		                    break;
		                case "countrycode":
		                    $output = @$ipdat->geoplugin_countryCode;
		                    break;
		            }
		        }
		    }
		    return $output;
		}

	
	public function user($x=""){
		
		if(!isset($_SESSION["_auth"]) || $this->isonline==0){
			if($x!=""){
				$_SESSION['where']=$x;
			}
			$this->alert->set("login to proceed", 'danger');			
			die(header('location:'. BURL . 'login'));

		}
	}

	public function admin($x=""){
		
		if(!isset($_SESSION["_auth"]) || $this->isonline==0){
			if($x!=""){
				$_SESSION['where']=$x;
			}
			$this->alert->set("login to proceed", 'danger');
			die(header('location:'. BURL . 'login'));

		}else if ($this->user->type<=7) {
			if($x!=""){
				$_SESSION['where']=$x;
			}
			$this->alert->set("login to proceed", 'danger');
			die(header('location:'. BURL . 'login'));
		}
	}

	public function suspension(){
		if($this->user->is_suspended==1){
			die(header('location:'.$this->base_url.'dashboard'));
		}
	}

	public function editor($x=""){
		
		if(!isset($_SESSION["_auth"]) || $this->isonline==0){
			if($x!=""){
				$_SESSION['where']=$x;
			}
			$this->alert->set("login to proceed", 'danger');
			die(header('location:'. BURL . 'login'));

		}else if ($this->user->type<5) {
			if($x!=""){
				$_SESSION['where']=$x;
			}
			$this->alert->set("login to proceed", 'danger');
			die(header('location:'. BURL . 'login'));
		}
	}

	public function form(){
		if(!isset($_SESSION["_auth"]) || $this->isonline==0){
			$this->error=1; $this->error_msg.=" User Authentication Failed";
		}	
	}

	public function form_admin(){
		if(!isset($_SESSION["_auth"]) || $this->isonline==0){
			$this->error=1; $this->error_msg.=" User Authentication Failed";
		}else if ($this->user->type<8) {
			$this->error=1; $this->error_msg.=" User Authentication Failed";
		}	
	}

	public function form_editor(){
		if(!isset($_SESSION["_auth"]) || $this->isonline==0){
			$this->error=1; $this->error_msg.=" User Authentication Failed";
		}else if ($this->user->type<5) {
			$this->error=1; $this->error_msg.=" User Authentication Failed";
		}	
	}



}

?>