<?php
session_start();

	if(isset($_POST["prihlasit"])){ 
		$jmeno = $_POST['fname'];
		$heslo = $_POST['psswd'];
		$_SESSION["sesID"] = $jmeno;
		$_SESSION["sesID"] = $heslo;
		//session_set_cookie_params(7200); 
	}

	if(isset($_POST["odlasit"])){ 
		session_unset();
	}

	if(!isset($_SESSION["sesID"])){
		header("Location:http://mujtest1234.000webhostapp.com/mojeProjekty/prichodyOdchody/index.php");	
		exit;
	}

				$servername = "localhost";
				$username = "id18288063_prihlasovani";
				$password = "kZ8x6!cd5eI2Ii%q";
				$dbname = "id18288063_test";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>