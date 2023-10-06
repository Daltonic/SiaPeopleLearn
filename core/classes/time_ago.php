<?php 
class time_ago{
	public function __construct($time){
		$time=time()-$time;
		if($time<60){
			echo $time." Secs Ago";
		}elseif($time>60 && $time<3600){
			echo (round($time/60))." Min(s) Ago";
		}elseif($time>3600 && $time<86400){
			echo (round($time/3600))." Hour(s) Ago";
		}elseif($time>86400 && $time<2592000){
			echo (round($time/86400))." Day(s) Ago";
		}elseif($time>2592000 && $time<31104000){
			echo (round($time/2592000))." Month(s) Ago";
		}else{
			echo "Over " .(round($time/31104000))." year(s) Ago";
		}
	}


}

?>