<?php
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	

	extract($_REQUEST);
	if($_POST){
		switch ($action){
		
		
			case "checkout":
				global $conn;
				$ip = getIp();
				$insert_user_sql = "insert into user (first_name,last_name,company_name,email,phone,ip_address) VALUES ('$first_name','$last_name','$company_name','$email','$phone','$ip')";
				$insert_user = mysqli_query($conn,$insert_user_sql);
				
				$last_inserted_user = mysqli_insert_id($conn);
				
				
				$ip = getIp();
				
				$check_cart = "select * from cart where ip_address='$ip'";
				$result = mysqli_query($conn,$check_cart);
				while($row = mysqli_fetch_array($result)){
					$product_id =  $row['product_id'];
					$ip_address =  $row['ip_address'];
					$insert_order_sql = "insert into orders (product_id,user_id,ip_address) VALUES ('$product_id','$last_inserted_user','$ip_address')";
					$insert_order = mysqli_query($conn,$insert_order_sql);
				}
				if($insert_order){
					$delete_cart_sql = "delete from cart where ip_address='$ip'";
					$delete_cart = mysqli_query($conn,$delete_cart_sql);
					echo 1;
				}
			
			break;
			
			case "delete_order":
				global $conn;
				$ip = getIp();
				
				$delete_order_sql = "delete from orders where ip_address='$ip' AND product_id='$product_id'";
				$delete_order = mysqli_query($conn,$delete_order_sql);
				echo 1;
			
			break;
		
		}
	}
	
	function getIp(){
		$ip = $_SERVER['REMOTE_ADDR'];
		
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		
		return $ip;
	}
	
	function get_user_orders()
	{
		global $conn;
		$ip = getIp();
		$result = mysqli_query($conn, "SELECT * FROM orders JOIN product ON product.product_id=orders.product_id WHERE orders.ip_address='$ip' " );
		
		return $result;
		
	}
	
	function get_all_orders()
	{
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM orders JOIN product ON product.product_id=orders.product_id " );
		return $result;
	}
	


	
	
	
?>