<?php
error_reporting(0);
 session_start();

if(!$_SESSION['usuario']) {
	echo"<script>setTimeout( function(){
			 location.href='../vai_da.php';
		}, 100 );</script>";


}


?>
