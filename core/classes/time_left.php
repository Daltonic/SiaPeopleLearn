<?php 
class time_left{
	public function __construct(){
	}

	public function get($time){
		$time=$time-time();
		if($time<60){
			return $time." Secs Left";
		}elseif($time>60 && $time<3600){
			return (round($time/60))." Min(s) Left";
		}elseif($time>3600 && $time<86400){
			return (round($time/3600))." Hour(s) Left";
		}elseif($time>86400 && $time<2592000){
			return (round($time/86400))." Day(s) Left";
		}elseif($time>2592000 && $time<31104000){
			return (round($time/2592000))." Month(s) Left";
		}else{
			return "Over " .(round($time/31104000))." year(s) Left";
		}
	}


}

?>