<?php
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	

	extract($_REQUEST);
	if($_POST){
		switch ($action){
			
			case "delete_admin":
				global $conn;
				
				$delete_admin_sql = "delete from admin where admin_id='$admin_id'";
				$delete_admin = mysqli_query($conn,$delete_admin_sql);
				echo 1;
			
			break;
		
		}
	}
	
	
?>