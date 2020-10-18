<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ableproadmin.com/light/vertical/login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jan 2018 17:50:04 GMT -->
<head>
	<title>Able Pro Responsive Bootstrap 4 Admin Template by Phoenixcoded</title>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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

	<!-- Font Awesome -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" method="POST"  id="login_form" name="login_form" enctype="multipart/form-data" action="">
						<div class="text-center">
							<img src="assets/logo.png">
						</div>
						<h3 class="text-center txt-primary">
							Sign In to your account
						</h3>
						<div class="md-input-wrapper">
							<input type="email" class="md-form-control" name="email" id="email" />
							<label>Email</label>
						</div>
						<div class="md-input-wrapper">
							<input type="password" class="md-form-control"  name="password" id="password"/>
							<label>Password</label>
						</div>
						
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button type="button" id="login_btn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
						<!-- <div class="card-footer"> -->
						<div class="col-sm-12 col-xs-12 text-center">
							<span class="text-muted">Don't have an account?</span>
							<a href="sign_up.php" class="f-w-600 p-l-5">Sign up Now</a>
						</div>

						<!-- </div> -->
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>


<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.form.min.js"></script>
<!-- tether.js -->
<script src="assets/js/tether.min.js"></script>
<!-- waves effects.js -->
<script src="assets/plugins/waves/js/waves.min.js"></script>
<!-- Required Framework -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/pages/elements.js"></script>
<script type="text/javascript" src="assets/js/common-pages.js"></script>


</body>

<!-- Mirrored from ableproadmin.com/light/vertical/login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Jan 2018 17:50:04 GMT -->
</html>

<script>
    $('#login_btn').click(function(event){

        event.preventDefault();
        var formData = new FormData($('#login_form')[0]);
        formData.append("action","login");
        //validation
        if($.trim($('#email').val()) == ""){
            alert("Email is required");
        }
		
		else if($.trim($('#password').val()) == ""){
            alert("Password is required");
        }
        else{
            //	$('#save_document').attr('disabled','disabled');
            $('#login_form').ajaxSubmit({
                'type': 'post',
				'url': "login_controller.php",
				'data': {'action':'login'},
                'dataType': 'json',
                success:function(data){
                    if($.trim(data) == 1){
                        //alert("Sign Up Successful.Login Now");
						window.location.replace("dashboard.php");
                    }
					else{
                        alert("Email or Password is wrong");
                    }
                }
            });
        }
    })
</script>