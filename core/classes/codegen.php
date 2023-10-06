<?php 
class codegen{
	function __construct($db,$tbname="",$colname=""){
		$this->db= $db;	
		$this->str="phecyhdgvkongfcsadfbfhjgvvqazwsxedcrfvtgbyhnujmikolpmnbvcxzalskdjfhfgqpowieurytmnbvcxzlkjhgfdsapoiuytrewq";
		if($tbname!="" && $colname!=""){
			$this->tbname=$tbname;
			$this->colname=$colname;
		}
	}
	function check(){
		$qstring="SELECT ".$this->colname." FROM ".$this->tbname." WHERE ".$this->colname."='".$this->code."'";
		$result=$this->db->query($qstring);
		if($result->num_rows>0){
			return 0;
		}else{
			return 1;
		}
	}
	function password($length){
		return substr(sha1(microtime()), rand(0,25),$length);	
	}
	function unique($length){
		$this->code=substr(sha1(microtime()), rand(0,25),$length);	
		if($this->check()==1){
			return $this->code;
		}else{
			$this->unique($length);
		}
	}

}



?>
