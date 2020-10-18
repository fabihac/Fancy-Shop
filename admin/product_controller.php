<?php
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	if($_POST)
	{		
		$target_dir = "uploads/products/";
		$target_file = $target_dir . basename($_FILES["produce_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["produce_image"]["tmp_name"], $target_file);

		$product['category_id'] = $_POST['product_category'];
		$product['product_type'] = $_POST['product_type'];
		$product['product_name'] = $_POST['product_name'];
		$product['product_tag'] = $_POST['product_tag'];
		$product['product_image'] = $target_file;
		$product['price'] = $_POST['price'];
		
		
		insert_product($product);
	}
		
	

	function get_all_products()
	{
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM product");
		return $result;
	}
	
	function get_products_by_type($product_type)
	{
		$type= $product_type;
		
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM product where product_type='$type'");
		return $result;
	}
	
	function get_products_by_category_type($product_category,$product_type,$product_id)
	{
		$category= $product_category;
		$type= $product_type;
		$id=$product_id;
		
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM product where product_type='$type' AND category_id='$category' AND product_id!='$id'");
		return $result;
	}
	
	function get_products_by_id($product_id)
	{
		$product_id= $product_id;
		
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM product where product_id='$product_id'");
		return $result;
	}
	
	
	
	function get_latest_products()
	{
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM product order by product_id desc limit 8");
		return $result;
	}
	
	function insert_product($product)
	{
		global $conn;
		mysqli_query($conn, "INSERT INTO product(category_id, product_type, product_name,product_tag, product_image, price) VALUES('".$product['category_id']."', '".$product['product_type']."', '".$product['product_name']."', '".$product['product_tag']."', '".$product['product_image']."', '".$product['price']."')");
		header("location: view_product_list.php");
	}
	
	
	
	
	
?>