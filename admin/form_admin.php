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
								<div class="card-header"><h5 class="card-header-text">Add Admin</h5>
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
									<form method="post" action="admin_controller.php" enctype = "multipart/form-data">
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">First Name</label>
											<input class="form-control" type="text" name="first_name" value="" id="first_name" required>
										</div>
										<div class="form-group">
											<label for="example-text-input" class="form-control-label">Last Name</label>
											<input class="form-control" type="text" name="last_name" value="" id="last_name" required>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1" class="form-control-label">Email address</label>
											<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
											<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1" class="form-control-label">Phone</label>
											<input class="form-control" type="tel" name="phone" value="" id="phone" required>
										</div>
										<div class="form-group">
											<label for="example-password-input" class="form-control-label">Password</label>
											<input class="form-control" type="password" name="password" value="" id="password" required>
										</div>
										<div class="form-group">
											<label for="file" class="form-control-label">Image Upload</label>
											<label for="file" class="custom-file">
												<input type="file" name="image" id="file" class="custom-file-input">
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