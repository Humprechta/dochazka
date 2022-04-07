<?php

	if(!isset($_SESSION["sesID"])){
		header("Location:http://mujtest1234.000webhostapp.com/mojeProjekty/prichodyOdchody/index.php");	
		exit;
	}

    if(!$_SESSION["sesID"][0]=="admin" and !$_SESSION["sesID"][1]=="admin"){
		header("Location:http://mujtest1234.000webhostapp.com/mojeProjekty/prichodyOdchody/index.php");	
		exit;
	}

?>