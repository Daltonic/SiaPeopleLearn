<?php
session_start();
include_once 'config/settings.php';

$page = $_GET['p'];
if(isset($_GET['params'])){
$params = $_GET['params'];
}else{
	$params="";
}
class boiler{
	public $error=0;
	public $error_msg="";
	public $page_title="";
	public $page_description="";
	public $page_keywords="";
	public $page_author="";
	public $page_image="";
	public $page_url="";
	public $page_twitter_card="";
	public $page_js="";

	public function __construct(){
		function my_autoload($classname){
			$ex=explode(',', EX);
		    if (in_array($classname, $ex)!=1) {
				if( file_exists("classes/".$classname.".php")==1 ) {
					require_once "classes/".$classname.".php";
				}elseif( file_exists("core/classes/".$classname.".php")==1 ) {
					require_once "core/classes/".$classname.".php";
				}

			}
		}
		
		spl_autoload_register('my_autoload');


		$this->db= new mysqli(DBHOST, DBUSR, DBPASS, DB);
		if ($this->db->connect_error) { die("opps, database connection failed try again later." );}
		include_once 'config/global_classes.php';	

			

		

		if (GLOBALFUNC!="") {
			$global_functions=explode(',', GLOBALFUNC);
			foreach ($global_functions as $value) {
				if( file_exists("functions/".$value.".php")==1 ) {
					include_once "functions/".$value.".php";
				}elseif( file_exists("core/functions/".$value.".php")==1 ) {
					include_once "core/functions/".$value.".php";
				}
			}
		}

	}
	
	public function set_token(){
		$this->token = sha1(substr(md5(microtime()),rand(0,26),20));
		$_SESSION['_token']=$this->token;
	}

	public function get_data($value=''){
		$this->data = json_decode(file_get_contents('php://input'));	
	}

	public function file_remove($value){

		if(file_exists($value)){
			unlink($value);
		}	
	}

	public function x($txt){
		return htmlspecialchars($txt, ENT_QUOTES, 'UTF-8');
	}

	public function validate(){

		if(isset($_POST[$_SESSION['_token']])){
			return 1;
		}else{
			$this->error=1;
			$this->error_msg.="Invalid Request ";
			return 0;
		}
	}
	public function auth_validate(){

		if($this->auth->error==1){
 			$this->error=1;
 			$this->error_msg.="user authentication failed ";
 		}
	}
}

function loaderror($erx=""){

	if (file_exists(include_once 'views/404.php')==1) {
		include_once 'views/404.php';
	}
	
}

if (file_exists('logic/'.$page.'.php')==1) {
	include 'logic/'.$page.'.php';
}
if (class_exists($page)){
	$page= new $page;
	if($params!=""){
		$params= explode('/', $params);
		$x=0;
		$count=count($params);

		if ($count==1) {
			$method=$params[0];	
			if (method_exists($page, $method)){
				$page->{$method}();
			}else{
				$page->defaultb($method);
			}
		}elseif($count>1){
			$method=array_shift($params);
			if (method_exists($page, $method)){
				$count=count($params);
				if($count==1){
					$page->{$method}($params[0]);
				}elseif($count==2){
					$page->{$method}($params[0],$params[1]);
				}elseif($count==3){
					$page->{$method}($params[0],$params[1],$params[2]);
				}elseif($count==4){
					$page->{$method}($params[0],$params[1],$params[2],$params[3]);
				}elseif($count==5){
					$page->{$method}($params[0],$params[1],$params[2],$params[3],$params[4]);
				}elseif($count==6){
					$page->{$method}($params[0],$params[1],$params[2],$params[3],$params[4],$params[5]);
				}else{
					loaderror(" too many parameters");
				}
			}else{

				loaderror(" page methoud not found or improperly named");
			}
			
		}
	}else{
		$page->defaultb();	
	}	
}else{

	loaderror(" page class not found or improperly named");
}



?>