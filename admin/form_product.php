<?php 
	session_start();
	if (($_SESSION["logged_admin"] == '') || (!isset($_SESSION["logged_admin"]))) {
		header('Location:index.php');
	}
	include 'header.php';
	include 'sidebar.php';
	include 'category_controller.php';
	include 'product_controller.php'
	
?>
    <div class="content-wrapper">

        <!-- Container-fluid starts -->
        <!-- Main content starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="main-header">
					<!-- Row start -->
					<div class="row">
						<!-- Form Control starts -->
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header"><h5 class="card-header-text">Add Product</h5>
								</div>
								<div class="modal fade modal-flex" id="input-type-Modal" tabindex="-1" role="dialog">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h5 class="modal-title">Code Explanation For Input Types </h5>
											</div>
											<!-- end of modal-header -->
											<div class="modal-body">
									<pre class="brush: html;">
									</pre>
											</div>
											<!-- end of modal-body -->
										</div>
										<!-- end of modal-content -->
									</div>
									<!-- end of modal-dialog -->
								</div>
								<!-- end of modal -->

								<div class="card-block">
									<form method="post" action="product_controller.php" enctype = "multipart/form-data">
										<div class="form-group">
											<label for="product_name" class="form-control-label">Product Name</label>
											<input class="form-control" type="text" value="" name="product_name" id="example-text-input" required>
										</div>
										<div class="form-group">
											<label for="product_type" class="form-control-label">Product Type</label>
												<select class="form-control" name="product_type" id="exampleSelect1" >
													<option value="1">Men</option>
													<option value="2">Women</option>
													<option value="3">Kids</option>
													<option value="4">Accessories</option>
												</select>
										</div>
										<div class="form-group">
											<label for="product_category" class="form-control-label">Product Category</label>
												<select name="product_category" class="form-control" id="exampleSelect1">
													<?php 
														$result = get_all_categories();
														while($row = mysqli_fetch_array($result)){
															$cat_id = $row['category_id'];
															$cat_title = $row['category_name'];
															echo "<option value='$cat_id'>$cat_title</option>";
														}
													?>
												</select>
										</div>
										
										<div class="form-group">
											<label for="product_type" class="form-control-label">Product Tag</label>
												<select class="form-control" name="product_tag" id="product_tag">
													<option value="1">Featured</option>
													<option value="2">Best Seller</option>
												</select>
										</div>
										
										<div class="form-group">
											<label for="price" class="form-control-label">Price</label>
											<input class="form-control" type="number" value="" name="price" id="example-number-input" required>
										</div>
										<div class="form-group">
											<label for="file" class="form-control-label">Product Image</label>
											<label for="file" class="custom-file">
												<input type="file" id="file" name="produce_image" class="custom-file-input" required>
												<span class="custom-file-control"></span>
											</label>
										</div>
										<button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Submit</button>
									</form>
								</div>
							</div>
						</div>
						<!-- Form Control ends -->
					</div>
					<!-- Row end -->
                </div>
            </div>
        </div>
        <!-- Main content ends -->



        <!-- Container-fluid ends -->
    </div>

<?php
include 'footer.php';

?>