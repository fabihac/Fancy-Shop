<?php 
	session_start();
	if (($_SESSION["logged_admin"] == '') || (!isset($_SESSION["logged_admin"]))) {
		header('Location:index.php');
	}
	include 'header.php';
	include 'sidebar.php';
	
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
								<div class="card-header"><h5 class="card-header-text">Add Category</h5>
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
									<form method="post" action="category_controller.php">
										<div class="form-group">
											<label for="exampleInputEmail1" class="form-control-label">Category Name</label>
											<input class="form-control" type="text" value="" name="category_name" id="example-text-input" required>
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