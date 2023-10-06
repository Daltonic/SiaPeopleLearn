<?php 
function mail_template($title,$content){
	$body='<title>'.$title.'</title>
	</head><body style="background-color: #ccc; padding:5%;"><div style="min-height:200px;background-color: white;width:70%;margin: 20px auto;border-radius: 10px; padding:15px;">
	<h2 style="color:#ccc">'.$title.'</h2>'.$content.'</div></body></html>';
	echo "<script></script>";
	return $body;
}
?>