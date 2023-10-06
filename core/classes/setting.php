<?php 
class setting{

	public function __construct($db){	
		
		$settingsq=$db->query("SELECT * FROM settings");
		while($setitem=$settingsq->fetch_assoc()){
			$this->{$setitem['item']}=$setitem['value'];
		}


	}

}

?>