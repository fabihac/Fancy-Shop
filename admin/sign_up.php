<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ableproadmin.com/light/vertical/register1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jan 2018 17:50:04 GMT -->
<head>
	<title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title>

	 <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
   	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  		<!--[if lt IE 9]>
  			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  			<![endif]-->

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="Phoenixcoded">
	<meta name="keywords"
	content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Phoenixcoded">

	<!-- Favicon icon -->
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<!-- waves css -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/waves/css/waves.min.css">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

	<!--color css-->
    <link rel="stylesheet" type="text/css" href="assets/css/color/color-1.css" id="color"/>


</head>
<body>
	<section class="login common-img-bg">
		<!-- Container-fluid starts -->
		<div class="container-fluid">
			<div class="row">
					<div class="col-sm-12">
						<div class="login-card card-block bg-white">
							<form class="md-float-material" method="POST"  id="sign_up_form" name="sign_up_form" enctype="multipart/form-data" action="">
								<div class="text-center">
									<img src="assets/logo.png">
								</div>
								<h3 class="text-center txt-primary">Create an account </h3>
								<div class="row">
									<div class="col-md-6">
											<div class="md-input-wrapper">
												<input type="text" name="first_name" id="first_name" class="md-form-control" required="">
												<label>First Name</label>
											</div>
									</div>
									<div class="col-md-6">
											<div class="md-input-wrapper">
												<input type="text" name="last_name" id="last_name" class="md-form-control" required="">
												<label>Last Name</label>
											</div>
									</div>
								</div>
									<div class="md-input-wrapper">
										<input type="email" name="email" id="email" class="md-form-control" required="">
										<label>Email Address</label>
									</div>
									<div class="md-input-wrapper">
										<input type="text" name="phone" id="phone" class="md-form-control" required="">
										<label>Phone</label>
									</div>
									<div class="md-input-wrapper">
										<input type="password" name="password" id="password" class="md-form-control" required="">
										<label>Password</label>
									</div>

								
								<div class="col-xs-10 offset-xs-1">
								<button type="button" id="save_admin"  class="btn btn-primary btn-md btn-block waves-effect waves-light m-b-20">Sign up
								</button>
								</div>
									<div class="row">
										<div class="col-xs-12 text-center">
											<span class="text-muted">Already have an account?</span>
											<a href="index.php" class="f-w-600 p-l-5"> Sign In Here</a>

										</div>
									</div>
							</form>
							<!-- end of form -->
						</div>
						<!-- end of login-card -->
					</div>
					<!-- end of col-sm-12 -->
				</div>
				<!-- end of row-->
			</div>
			<!-- end of container-fluid -->
	</section>

	<!-- Required Jqurey -->
	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
	<script src="assets/js/jquery.form.min.js"></script>
	<!-- tether.js -->
	<script src="assets/js/tether.min.js"></script>
	<!-- waves effects.js -->
	<script src="assets/plugins/waves/js/waves.min.js"></script>
	<!-- Required Framework -->
	<script src="assets/js/bootstrap.min.js"></script>

	<!--text js-->
	<script type="text/javascript" src="assets/pages/elements.js"></script>
	<script type="text/javascript" src="assets/js/common-pages.js"></script>

</body>

<!-- Mirrored from ableproadmin.com/light/vertical/register1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jan 2018 17:50:04 GMT -->
</html>

<script>
    $('#save_admin').click(function(event){

        event.preventDefault();
        var formData = new FormData($('#sign_up_form')[0]);
        formData.append("action","sign_up");
        //validation
        if($.trim($('#first_name').val()) == ""){
            alert("First name is required");
        }
        else if($.trim($('#last_name').val()) == ""){
            alert("Last name is required");
        }
		else if($.trim($('#email').val()) == ""){
            alert("Email is required");
        }
		else if($.trim($('#phone').val()) == ""){
            alert("Phone is required");
        }
		else if($.trim($('#password').val()) == ""){
            alert("Password is required");
        }
        else{
            //	$('#save_document').attr('disabled','disabled');
            $('#sign_up_form').ajaxSubmit({
                'type': 'post',
				'url': "sign_up_controller.php",
				'data': {'action':'sign_up'},
                'dataType': 'json',
                success:function(data){
                    if($.trim(data) == 1){
                        alert("Sign Up Successful.Login Now");
						window.location.replace("index.php");
                    }
					else{
                        alert("Sign Up Failed");
                    }
                }
            });
        }
    })
</script>
