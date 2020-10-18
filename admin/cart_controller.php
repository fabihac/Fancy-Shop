<?php
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	

	extract($_REQUEST);
	if($_POST){
	switch ($action){
	
	
		case "add_to_cart":
			global $conn;
			$ip = getIp();
			
			$check_cart = "select * from cart where ip_address='$ip' AND product_id='$product_id'";
			$run_check = mysqli_query($conn,$check_cart);
			if(mysqli_num_rows($run_check) > 0){
				echo 0;
			}
			else{
				$insert_product = "insert into cart (product_id,ip_address) VALUES ('$product_id','$ip')";
				$run_pro = mysqli_query($conn,$insert_product);
				echo 1;
			}
		
		break;
		
		case "delete_cart":
			global $conn;
			$ip = getIp();
			
			$delete_cart_sql = "delete from cart where ip_address='$ip' AND product_id='$product_id'";
			$delete_cart = mysqli_query($conn,$delete_cart_sql);
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
	
	function get_user_carts()
	{
		global $conn;
		$ip = getIp();
		$result = mysqli_query($conn, "SELECT * FROM cart JOIN product ON product.product_id=cart.product_id WHERE cart.ip_address='$ip' " );
		
		return $result;
		
	}
	
	function get_all_carts()
	{
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM cart JOIN product ON product.product_id=cart.product_id " );
		return $result;
	}
	


	
	
	
?>