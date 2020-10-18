<?php
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	

	extract($_REQUEST);
	if($_POST){
		switch ($action){
			
			case "delete_product":
				global $conn;
				
				$delete_product_sql = "delete from product where product_id='$product_id'";
				$delete_product = mysqli_query($conn,$delete_product_sql);
				echo 1;
			
			break;
		
		}
	}
	
	
?>