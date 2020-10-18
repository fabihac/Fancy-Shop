<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	

	extract($_REQUEST);
	if($_POST){
		switch ($action){
		
		
			case "login":
				global $conn;
				$pass = md5($password);
				
				$sql = "SELECT * from admin where email='$email' and password='$pass'";
				$result = $conn->query($sql);
				$row = mysqli_fetch_array($result);
				if ($row["email"] == $email && $row["password"] == $pass){
					$_SESSION["logged_admin"] = $row["admin_id"];
					echo 1;
				}else{
					echo 0;
				}
			
			break;
			
		
		}
	}
	
	
	
?>