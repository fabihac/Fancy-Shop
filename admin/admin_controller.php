<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");
	if($_POST)
	{		
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

		$admin['first_name'] = $_POST['first_name'];
		$admin['last_name'] = $_POST['last_name'];
		$admin['email'] = $_POST['email'];
		$admin['phone'] = $_POST['phone'];
		$admin['password'] = md5($_POST['password']);
		$admin['created_by'] = $_SESSION["logged_admin"];
		$admin['image'] = $target_file;
		
		insert_admin($admin);
	}
	
	function get_all_admins()
	{
		global $conn;
		$result = mysqli_query($conn, "SELECT * FROM admin");
		return $result;
	}
	function get_admin_name_by_id($id)
	{
		global $conn;
		$result = mysqli_query($conn, "SELECT first_name, last_name FROM admin where admin_id = ".$id);
		while($row = mysqli_fetch_array($result))
		{
			return $row['first_name']." ".$row['last_name'];
		}
	}
	
	function insert_admin($admin)
	{
		global $conn;
		mysqli_query($conn, "INSERT INTO admin(first_name, last_name, email, phone, password, created_by, image) VALUES('".$admin['first_name']."', '".$admin['last_name']."', '".$admin['email']."', '".$admin['phone']."', '".$admin['password']."', '".$admin['created_by']."', '".$admin['image']."')");
		header("location: view_admin_list.php");
	}
?>