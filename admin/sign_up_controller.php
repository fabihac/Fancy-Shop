<?php

	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	

	extract($_REQUEST);
	if($_POST){
		switch ($action){
		
		
			case "sign_up":
				global $conn;
				$pass = md5($password);
				$insert_admin_sql = "insert into admin (first_name,last_name,email,phone,password) VALUES ('$first_name','$last_name','$email','$phone','$pass')";
				$insert_admin = mysqli_query($conn,$insert_admin_sql);
			
				echo 1;
				
				
				
			
			break;
			
		
		}
	}
	
	
	
?>