<?php
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");
	if($_POST)
	{
		insert_category($_POST['category_name']);
	}
	function get_all_categories()
	{
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM product_category");
		return $result;
	}
	
	function get_category_by_id($id)
	{
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM product_category WHERE category_id = ".$id);
		while($row = mysqli_fetch_array($result))
		{
			return $row['category_name'];
		}
	}
	
	function insert_category($category_name)
	{
		global $conn;
		mysqli_query($conn, "INSERT INTO product_category(category_name) VALUES('".$category_name."')");
		header("location: form_category.php");
	}
?>