<?php 
function mail_template($title,$content,$footer=""){
	$body='
<html>
	<head>
		<title>'.$title.'</title>
		<style type="text/css">
			body{
				background-color: white; 
				padding:0px; 
				margin: 0px;
			}

			.wrapper{
				background-color: white; 
				width:100%; 
				margin: 0px auto; 
				padding: 0px;
			}
			.header{
				background-color: #FAF9F6; 
				padding:35px; 
				margin:0px;
				color: #70706F; 
				text-align: center;

			}
			.main-content{
				min-height:400px; 
				padding:15px; 
				color: #70706F;
			}

			.footer{
				background-color: #FAF9F6; 
				padding:15px; 
				color: #70706F; 
				text-align: center;
			}

			.red-bg{
				background-color: #F07470;
			}

			.gray_bg{
				background-color: #FAF9F6; 
			}
			.white-text{
				color: white;
			}
			
		</style>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<h2 >'.$title.'</h2>	
			</div>
			
			<div class="main-content" >'.$content.'</div>
			<div class="footer">
				'.$footer.'
			</div>
		</div>
	</body>
</html>';
}
?>