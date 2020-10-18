<?php
	include('header.php');
	include 'admin/category_controller.php';
	include 'admin/product_controller.php';

?>
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3>Product Details</h3>
			</div>		

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="#">home</a></li>
					<li><a href="#">category</a></li>
					<li><span>Product Details</span></li>
				</ul>					
			</div>	
				
		
			
		</div>
	</div>
</div>

<!-- Product Details Area  -->
<div class="prdct_dtls_page_area">
	<div class="container">
		<div class="row">
			<?php
				if($_GET){
				$product_id = $_GET['product_id'];
				
					
				$result = get_products_by_id($product_id);
				while($row = mysqli_fetch_array($result)){
					$product_category=$row['category_id'];
					$product_type=$row['product_type'];
					//if($row['product_tag'] == 1){
			?>
			<!-- Product Details Image -->
			<div class="col-md-6 col-xs-12">
				<div class="pd_img fix">
					<a class="venobox" href="#"><img src="admin/<?php echo $row['product_image'] ?>" alt=""/></a>
				</div>
			</div>
			<!-- Product Details Content -->
			<div class="col-md-6 col-xs-12">
				<div class="prdct_dtls_content">
					<a class="pd_title" href="#"><?php echo $row['product_name'];?></a>
					<div class="pd_price_dtls fix">
						<!-- Product Price -->
						<div class="pd_price">
							<span class="new">$ <?php echo $row['price'];?></span>
							
						</div>
						<!-- Product Ratting -->
						<div class="pd_ratng">
							&nbsp;
						</div>
					</div>
					<div class="pd_text">
						<h4>details:</h4>
						<p><?php echo $row['product_details'];?></p>
					</div>
					<div class="pd_img_size fix">
						&nbsp;
					</div>
					<div class="pd_clr_qntty_dtls fix">
						&nbsp;
					</div>
					<!-- Product Action -->
					<div class="pd_btn fix">
						<a class="btn btn-default acc_btn">add to cart</a>
						<a class="btn btn-default acc_btn btn_icn"><i class="fa fa-heart"></i></a>
						<a class="btn btn-default acc_btn btn_icn"><i class="fa fa-refresh"></i></a>
					</div>
					<div class="pd_share_area fix">
						<h4>share this on:</h4>
						<div class="pd_social_icon">
							<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
							<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
							<a class="vimeo" href="#"><i class="fa fa-vimeo"></i></a>
							<a class="google_plus" href="#"><i class="fa fa-google-plus"></i></a>
							<a class="tumblr" href="#"><i class="fa fa-tumblr"></i></a>
							<a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
				</div>
			</div>
					<?php }
				}?>
		</div>
		
		
		</div>
	</div>


<!-- Related Product Area -->
<div class="related_prdct_area text-center">
	<div class="container">		
			<!-- Section Title -->
		<div class="rp_title text-center"><h3>Related products</h3></div>
		
		<div class="row">
			<?php 
				$results = get_products_by_category_type($product_category,$product_type,$product_id);
				while($rows = mysqli_fetch_array($results)){
					
			?>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="single_product">
					<div class="product_image">
						<img src="admin/<?php echo $rows['product_image'] ?>" alt=""/>
						<div class="box-content">
							<a href="#"><i class="fa fa-cart-plus"></i></a>
						</div>										
					</div>

					<div class="product_btm_text">
						<h4><a href="product-details.php?product_id=<?php echo $rows['product_id']?>"><?php echo $rows['product_name'];?></a></h4>
						<span class="price">$<?php echo $rows['price'];?></span>
					</div>
				</div>								
			</div> <!-- End Col -->	
				<?php } ?>
		</div>
	</div>
</div>
<?php include('footer.php');?>
		