<?php 
	
	$conn = mysqli_connect("localhost", "root", "", "fancyshop");	
	$ip = $_SERVER['REMOTE_ADDR'];
		
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	$result = mysqli_query($conn, "SELECT * FROM cart JOIN product ON product.product_id=cart.product_id WHERE cart.ip_address='$ip' " );
	$total_cart = mysqli_num_rows($result);
	
	
		
		
		

?>
<!DOCTYPE HTML>
<html lang="en-US">

<!-- Mirrored from www.getmasum.com/html-preview/fancyshop/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Apr 2018 12:22:53 GMT -->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FancyShop - Ecommerce</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">	
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/owl.theme.default.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/meanmenu.min.css" />
	<link rel="stylesheet" href="css/venobox.css" />
	<link rel="stylesheet" href="css/font-awesome.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />	
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="css/responsive.css" />	
	<script src="admin/assets/js/jquery-3.1.1.min.js"></script>
	<script src="admin/assets/js/jquery-ui.min.js"></script>
	
</head>
	<body>
	
		<!--  Preloader  -->
		
		<div class="preloader">
			<div class="status-mes">
				<div class="bigSqr">
					<div class="square first"></div>
					<div class="square second"></div>
					<div class="square third"></div>
					<div class="square fourth"></div>
				</div>
				<div class="text_loading text-center">loading</div>
			</div>
		</div>
		
		<!--  Start Header  -->
		<header id="header_area">
			<div class="header_top_area">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="hdr_tp_left">
								<div class="call_area">
									<span class="single_con_add"><i class="fa fa-phone"></i> +0123456789</span>
									<span class="single_con_add"><i class="fa fa-envelope"></i> fancyshop@gmail.com</span>
								</div>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-6">
							&nbsp;
						</div>
					</div>
				</div>
			</div> <!--  HEADER START  -->
			
			<div class="header_btm_area">
				<div class="container">
					<div class="row">		
						<div class="col-xs-12 col-sm-12 col-md-3"> 
							<a class="logo" href="index.php"> <img alt="" src="img/logo.png"></a> 
						</div><!--  End Col -->
						
						<div class="col-xs-12 col-sm-12 col-md-9 text-right">
							<div class="menu_wrap">
								<div class="main-menu">
									<nav>
										<ul>
											<li><a href="index.php">home</a>					
											</li>									
											
											<li><a href="#">Shop <i class="fa fa-angle-down"></i></a>
												<!-- Sub Menu -->
												<ul class="sub-menu">
													<li><a href="cart.php">Cart List</a></li>
													<li><a href="order_list.php">Order List</a></li>
												</ul>
											</li>
											<li><a href="products.php">Products</a></li>
											
											
											
											<li><a href="contact.php">contact</a></li>
										</ul>
									</nav>
								</div> <!--  End Main Menu -->					

								
								<div class="right_menu">
									<ul class="nav justify-content-end">
										
										<li>
											<div class="cart_menu_area">
												<div class="cart_icon">
													
													<a href="#"><i class="fa fa-shopping-bag " aria-hidden="true"></i></a>
													<span class="cart_number"><?php echo $total_cart; ?></span>
												</div>
												
												
												<!-- Mini Cart Wrapper -->
												<div class="mini-cart-wrapper">
													<!-- Product List -->
													<div class="mc-pro-list fix">
														<?php 
															$total_price=0;
															while($row = mysqli_fetch_array($result)){?>
														<div class="mc-sin-pro fix">
															<a href="#" class="mc-pro-image float-left"><img src="admin/<?php echo $row['product_image'] ?>" alt="" height="50px" width="50px" /></a>
															<div class="mc-pro-details fix">
																<a href="#"><?php echo $row['product_name'];?></a>
																<span>1x$<?php echo $row['price'];?></span>
																<a class="pro-del" href="javascript:;" onclick="delete_cart(<?php echo $row['product_id'] ?>)"><i class="fa fa-times-circle"></i></a>
															</div>
														</div>
														<?php 
															$total_price += $row['price'];
														} ?>
													</div>
													<!-- Sub Total -->
													<div class="mc-subtotal fix">
														<h4>Total <span>$<?php echo $total_price;?></span></h4>												
													</div>
													<!-- Cart Button -->
													<div class="mc-button">
														<a href="checkout.php" class="checkout_btn">checkout</a>
													</div>
												</div>											
											</div>	
											
										</li>
									</ul>
								</div>							
							</div>
						</div><!--  End Col -->										
					</div>
				</div>
			</div>
		</header>
		
<script type="text/javascript">
	
	function delete_cart(product_id) {
		if(product_id) {
            $.ajax({
			    'type': 'post',
				'url': "admin/cart_controller.php",
				'data': {'action':'delete_cart', 'product_id':product_id},
                'dataType': 'json',
                'success': function(data){
                    if($.trim(data) == 1){
						alert("Cart Deleted Successfully");
						window.location.replace("cart.php");
					}
                }
            });
        }
        
    }
	
	
	
	
</script>