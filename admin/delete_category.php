<?php
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	

	extract($_REQUEST);
	if($_POST){
		switch ($action){
			
			case "delete_category":
				global $conn;
				
				$delete_category_sql = "delete from product_category where category_id='$category_id'";
				$delete_category = mysqli_query($conn,$delete_category_sql);
				echo 1;
			
			break;
		
		}
	}
	
	
?>