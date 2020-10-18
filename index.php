<?php
	include('header.php');
	include 'admin/category_controller.php';
	include 'admin/product_controller.php';

?>
<section id="slider_area" class="text-center">
	<div class="slider_active owl-carousel">
		<div class="single_slide" style="background-image: url(img/slider/1.jpg); background-size: cover; background-position: center;">
			<div class="container">	
				<div class="single-slide-item-table">
					<div class="single-slide-item-tablecell">
						<div class="slider_content text-left slider-animated-1">						
							<p class="animated">New Year 2018</p>
							<h1 class="animated">best shopping</h1>
							<h4 class="animated">Big Sale of This Week 50% off</h4>
							<a href="#" class="btn main_btn animated">shop now</a>
						</div>
					</div>
				</div>						
			</div>
		</div>
		
		<div class="single_slide" style="background-image: url(img/slider/2.jpg); background-size: cover; background-position: center ;">
			<div class="container">		
				<div class="single-slide-item-table">
					<div class="single-slide-item-tablecell">
						<div class="slider_content text-center slider-animated-2">						
							<p class="animated">Women fashion</p>
							<h1 class="animated">popular style</h1>

							<a href="#" class="btn main_btn animated">shop now</a>
						</div>
					</div>
				</div>	
			</div>
		</div>
		
		<div class="single_slide" style="background-image: url(img/slider/3.jpg); background-size: cover; background-position: center ;">
			<div class="container">
				<div class="single-slide-item-table">
					<div class="single-slide-item-tablecell">
						<div class="slider_content text-right slider-animated-3">						
							<p class="animated">Men Collection</p>
							<h1 class="animated">popular style</h1>

							<a href="#" class="btn main_btn animated">shop now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
		<!-- End Slider Area -->		
	
		<!--  Promo ITEM STRAT  -->
<section id="promo_area" class="section_padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">	
				<a href="products.php?type=1">
					<div class="single_promo">
						<img src="img/promo/1.jpg" alt="">
						<div class="box-content">
							<h3 class="title">Men</h3>
							<span class="post">2018 Collection</span>
						</div>
					</div>
				</a>						
			</div><!--  End Col -->						
			
			<div class="col-lg-4 col-md-6 col-sm-12">
                <a href="products.php?type=3">
					<div class="single_promo">
						<img src="img/promo/kid.jpg" alt="">
						<div class="box-content">
							<h3 class="title">KIDS</h3>
							<span class="post">2018 Collection</span>
						</div>
					</div>	
				</a>

                <a href="products.php?type=4">
					<div class="single_promo">
						<img src="img/promo/4.jpg" alt="">
						<div class="box-content">
							<h3 class="title">ACCESSORIES</h3>
							<span class="post">2018 Collection</span>
						</div>
					</div>	
				</a>	
				
			</div><!--  End Col -->					

			<div class="col-lg-4 col-md-6 col-sm-12">
                <a href="products.php?type=2">
					<div class="single_promo">
						<img src="img/promo/3.jpg" alt="">
						<div class="box-content">
							<h3 class="title">Women</h3>
							<span class="post">2018 Collection</span>
						</div>
					</div>
				</a>	
			</div><!--  End Col -->					
		
		</div>			
	</div>		
</section>
		<!--  Promo ITEM END -->	
		

		<!-- Start product Area -->
<section id="product_area" class="section_padding">
	<div class="container">		
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section_title">						
					<h2>Our <span>Products</span></h2>
					<div class="divider"></div>							
				</div>
			</div>
		</div>
	
		<div class="text-center">
			<div class="product_filter">
				<ul>
					<li class=" active filter" data-filter="all">ALL</li>
					<li class="filter" data-filter=".bslr">Bestseller</li>
					<li class="filter" data-filter=".ftrd">Featured</li>
				</ul>
			</div>
			
			<div class="product_item">
				<div class="row">
					<?php 
						$result = get_all_products();
						while($row = mysqli_fetch_array($result)){
							if($row['product_tag'] == 1){
					?>
					<div class="col-lg-3 col-md-4 col-sm-6 mix ftrd">
						<div class="single_product">
							<div class="product_image">
								<img src="admin/<?php echo $row['product_image'] ?>" alt=""/>
								<div class="new_badge">Featured</div>
								<div class="box-content">
									<a href="javascript:;" onclick="add_to_cart(<?php echo $row['product_id'] ?>)"><i class="fa fa-cart-plus"></i></a>

								</div>										
							</div>

							<div class="product_btm_text">
								<h4><a href="product-details.php?product_id=<?php echo $row['product_id']?>"><?php echo $row['product_name'];?></a></h4>							
								<span class="price">$<?php echo $row['price'];?></span>
	
							</div>
						</div>
						
					</div> <!-- End Col -->	
					<?php }else if($row['product_tag'] == 2){ ?>
					<div class="col-lg-3 col-md-4 col-sm-6 mix bslr">
						<div class="single_product">
							<div class="product_image">
								<img src="admin/<?php echo $row['product_image'] ?>" alt=""/>
								<div class="new_badge">Best Seller</div>
								<div class="box-content">
									<a href="javascript:;" onclick="add_to_cart(<?php echo $row['product_id'] ?>)"><i class="fa fa-cart-plus"></i></a>

								</div>										
							</div>

							<div class="product_btm_text">
								<h4><a href="product-details.php?product_id=<?php echo $row['product_id']?>"><?php echo $row['product_name'];?></a></h4>							
								<span class="price">$<?php echo $row['price'];?></span>
	
							</div>
						</div>
						
					</div> <!-- End Col -->	
						<?php 
							}
							}
						?>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- End product Area -->

<!-- Special Offer Area -->
<div class="special_offer_area gray_section">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="special_img text-left">
					<img src="img/special.png" width="370" alt="" class="img-responsive">
					<span class="off_baudge text-center">30% <br /> Off</span>
				</div>
			</div>			

			<div class="col-md-7 text-left">
				<div class="special_info">			
					<h3>Men Collection 2018</h3>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum</p>							
					<a href="#" class="btn main_btn">Shop Now</a>					
				</div>
			</div>
		</div>

	</div>
</div> <!-- End Special Offer Area -->

		<!-- Start Featured product Area -->
<section id="featured_product" class="featured_product_area section_padding">
	<div class="container">		
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section_title">						
					<h2>Latest <span> Products</span></h2>
					<div class="divider"></div>							
				</div>
			</div>
		</div>

		<div class="row text-center">
			<?php $result = get_all_products();
				while($row = mysqli_fetch_array($result)){ ?>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="single_product">
					<div class="product_image">
						<img src="admin/<?php echo $row['product_image'] ?>" alt=""/>
						<div class="new_badge">Latest</div>
						<div class="box-content">
							<a href="javascript:;" onclick="add_to_cart(<?php echo $row['product_id'] ?>)"><i class="fa fa-cart-plus"></i></a>
							
						</div>										
					</div>

					<div class="product_btm_text">
						<h4><a href="product-details.php?product_id=<?php echo $row['product_id']?>"><?php echo $row['product_name'];?></a></h4>							
						<span class="price">$<?php echo $row['price'];?></span>

					</div>
				</div>							
			</div> 
				<?php } ?>
			
		</div>
	</div>
</section>

<script type="text/javascript">
	
	
	function add_to_cart(product_id) {
		if(product_id) {
            $.ajax({
			    'type': 'post',
				'url': "admin/cart_controller.php",
				'data': {'action':'add_to_cart', 'product_id':product_id},
                'dataType': 'json',
                'success': function(data){
                    if($.trim(data) == 1){
						alert("Cart Added Successfully");
						window.location.replace("cart.php");
					}
					else{
						alert("Already Added");		
						window.location.replace("cart.php");
					}
                }
            });
        }
        
    }
	
	
	
	
</script>

<?php include('footer.php');?>
		
		