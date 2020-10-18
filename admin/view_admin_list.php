<?php 
	session_start();
	if (($_SESSION["logged_admin"] == '') || (!isset($_SESSION["logged_admin"]))) {
		header('Location:index.php');
	}
	include 'header.php';
	include 'sidebar.php';
	include 'admin_controller.php'
?>
    <div class="content-wrapper">

        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table m-b-0 photo-table">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php $result = get_all_admins();
									while($row = mysqli_fetch_array($result)){?>
                                    <tr>
                                        <th>
                                            <img class="img-fluid img-circle" src="<?php echo $row['image'] ?>" alt="User">
                                        </th>
                                        <td><?php echo $row['first_name']." ".$row['last_name']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['phone']?></td>
                                        <td><?php echo $row['password']?></td>
										<td>
											<a href="javascript:;" onclick="delete_admin(<?php echo $row['admin_id'] ?>)" class="text-muted"><i class="icofont icofont-ui-delete"></i></a>
										</td>
                                 
                                    </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content ends -->



        <!-- Container-fluid ends -->
    </div>
<script type="text/javascript">
	
	function delete_admin(admin_id) {
		if(admin_id) {
            $.ajax({
			    'type': 'post',
				'url': "delete_admin.php",
				'data': {'action':'delete_admin', 'admin_id':admin_id},
                'dataType': 'json',
                'success': function(data){
                    if($.trim(data) == 1){
						alert("Admin Deleted Successfully");
						window.location.reload();
					}
                }
            });
        }
        
    }
	
	
	
	
</script>
<?php
include 'footer.php';

?>