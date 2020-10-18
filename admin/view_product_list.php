<?php 
	session_start();
	if (($_SESSION["logged_admin"] == '') || (!isset($_SESSION["logged_admin"]))) {
		header('Location:index.php');
	}
	include 'header.php';
	include 'sidebar.php';
	include 'category_controller.php';
	include 'product_controller.php';
?>
    <div class="content-wrapper">

        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid">
            <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Product List</h5>
                                </div>
                                <div class="table-responsive dasboard-4-table-scroll">
                                    <div class="table-content">
                                        <div class="project-table p-20">
                                            <table id="product-list-dasbord" class="table dt-responsive nowrap" width="100%" cellspacing="0">
												<thead>
													<tr class="text-uppercase">
														<th>Product Image</th>
														<th>Product Name</th>
														<th>Category</th>
														<th>Price</th>
														<th>Action</th>
													</tr>
												</thead>
                                                <tbody>
													<?php $result = get_all_products();
													while($row = mysqli_fetch_array($result)){?>
                                                    <tr>
                                                        <td class="img-pro">
                                                            <img src="<?php echo $row['product_image'] ?>" class="img-fluid d-inline-block" alt="Product Image">
                                                        </td>
                                                        <td class="pro-name">
                                                            <h6><?php echo $row['product_name'];?></h6>
                                                        </td>
                                                        <td class="pro-name">
                                                            <h6><?php echo get_category_by_id($row['category_id']);?></h6>
                                                        </td>
                                                        <td>$<?php echo $row['price'];?></td>
														<td>
															<a href="javascript:;" onclick="delete_product(<?php echo $row['product_id'] ?>)" class="text-muted"><i class="icofont icofont-ui-delete"></i></a>
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
        </div>
        <!-- Main content ends -->



        <!-- Container-fluid ends -->
    </div>
<script type="text/javascript">
	
	function delete_product(product_id) {
		if(product_id) {
            $.ajax({
			    'type': 'post',
				'url': "delete_product.php",
				'data': {'action':'delete_product', 'product_id':product_id},
                'dataType': 'json',
                'success': function(data){
                    if($.trim(data) == 1){
						alert("Product Deleted Successfully");
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