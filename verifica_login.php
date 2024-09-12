<?php

	session_start();
	
       if(!$_SESSION['usuario'] && !$_SESSION['senha']) {
     	header('Location: index.php');
	   exit();
   }
   

?>