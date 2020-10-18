<?php 
	session_start();
	if (($_SESSION["logged_admin"] == '') || (!isset($_SESSION["logged_admin"]))) {
		header('Location:index.php');
	}
	include 'header.php';
	include 'sidebar.php';
	include 'category_controller.php';
?>
    <div class="content-wrapper">

        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid">
            <!-- Row start -->
			<div class="row">
				<!-- List View starts -->
				<div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table m-b-0 photo-table">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php $result = get_all_categories();
									while($row = mysqli_fetch_array($result)){?>
                                    <tr>
                                        <td><?php echo $row['category_id']?></td>
                                        <td><?php echo $row['category_name']?></td>
                                        <td>
											<a href="javascript:;" onclick="delete_category(<?php echo $row['category_id'] ?>)" class="text-muted"><i class="icofont icofont-ui-delete"></i></a>
										</td>
										
                                    </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- Basic list ends -->
			</div>
			<!-- Row end -->
        </div>
        <!-- Main content ends -->



        <!-- Container-fluid ends -->
    </div>
<script type="text/javascript">
	
	function delete_category(category_id) {
		if(category_id) {
            $.ajax({
			    'type': 'post',
				'url': "delete_category.php",
				'data': {'action':'delete_category', 'category_id':category_id},
                'dataType': 'json',
                'success': function(data){
                    if($.trim(data) == 1){
						alert("Category Deleted Successfully");
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